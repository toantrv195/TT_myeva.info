<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Category;
use App\News;
use Auth;
use File; 
use App\Tag;
use App\News_tags;

class ArticleController extends Controller
{
    public function getlist()
    {
        $data = News::select('id', 'title', 'image', 'intro', 'content', 'views', 'likes', 'hot_news', 'url', 'cate_id', 'tag')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.article.list',compact('data'));
    }
    public function getadd()
    {
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('admin.article.add',compact('parent'));
    }
    public function postadd(ArticleRequest $request)
    {
        $file_name=$request->file('fImages')->getClientOriginalName();
        $new = new News();
        $new->title = $request->txtTitle;
        $new->alias = changeTitle($request->txtTitle);
        $new->image = $file_name;
        $new->intro = $request->txtIntro;
        $new->content = $request->txtContent;
        $new->views = 0;
        $new->likes = 0;
        $new->hot_news = $request->rdoStatus;
        $new->url = $request->txturl;
        $new->tag = $request->tag;
        $new->user_id = Auth::user()->id;
        $new->cate_id = $request->sltparent;
        $request->file('fImages')->move('resources/upload/',$file_name);
        $new->save();
        $id_news = $new->id;
        $arr_tag = explode(",", $request->tag);
        foreach ($arr_tag as  $tag) {
            $tag = trim($tag);
            $tag_name = Tag::where('name',$tag)->first();
            if(isset($tag_name))
            {
                $idtag = Tag::select('id')->where('name',$tag)->get();
            }
            else
            {
                $tags = new Tag();
                $tags->name = $tag;
                $tags->save();
                $idtag = Tag::select('id')->where('name',$tag)->get();
            }

            foreach ($idtag as $tagid) {
                $news_tags = new News_tags();
                $news_tags->news_id = $id_news;
                $news_tags->tag_id = $tagid->id;
                $news_tags->save();
            }
            

        }
        return redirect()->route('admin.article.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Article']);
    }

    public function getdelete($id)
    {
        $news_tags = News_tags::where('news_id',$id);
        $news_tags->delete();
        $new = News::find($id);
        File::delete('resources/upload/'.$new->image);
        $new->delete($id);
        return redirect()->route('admin.article.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Article']);

    }

    public function getedit($id)
    {
        $data = News::find($id)->toArray();
        $cate = Category::select('id','name','parent_id')->get()->toArray();
        return view('admin.article.edit',compact('data','cate'));
    }   

    public function postedit($id,ArticleRequest $request)
    {
        $news = News::find($id);
        $news->title = $request->txtTitle;
        $news->alias = changeTitle($request->txtTitle);
        $news->intro = $request->txtIntro;
        $news->content = $request->txtContent;
        $news->hot_news = $request->rdoStatus;
        $news->url = $request->txturl;
        $news->tag = $request->tag;
        $news->user_id = Auth::user()->id;
        $news->cate_id = $request->sltparent;
        $img_current = 'resources/upload/'.$request->file('img_current');
        if (!empty($request->file('fImages')))  
        { 
            $file_name = $request->file('fImages')->getClientOriginalName();
            $news->image = $file_name;
            $request->file('fImages')->move('resources/upload/',$file_name);
            if(File::exists($img_current)) {
                File::delete($img_current);
            } 

        }else{
            echo "Not Exists File";
            
        }
        $news->save();
        $news_tags = News_tags::where('news_id',$id);
        $news_tags->delete();
        $id_news = $news->id;
        $arr_tag = explode(",", $request->tag);
        foreach ($arr_tag as  $tag) {
            $tag = trim($tag);
            $tag_name = Tag::where('name',$tag)->first();
            if(isset($tag_name))
            {
                $idtag = Tag::select('id')->where('name',$tag)->get();
            }
            else
            {
                $tags = new Tag();
                $tags->name = $tag;
                $tags->save();
                $idtag = Tag::select('id')->where('name',$tag)->get();
            }

            foreach ($idtag as $tagid) {
                $news_tags = new News_tags();
                $news_tags->news_id = $id_news;
                $news_tags->tag_id = $tagid->id;
                $news_tags->save();
            }
        }
            
        return redirect()->route('admin.article.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Update Article']);

    }
}
