<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\News;
class HomeController extends Controller
{
   
    public function index()
    {
    	$news = DB::table('news')->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')->orderBy('news.id', 'DESC')->paginate(6);
        return view('user.pages.home', compact('news'));
    }
    //category
    public function getcate($id)
    {	
    	$category = DB::table('category')->select('id', 'name', 'alias')->where('id', $id)->first();
    	$cate = DB::table('news')->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')->where('cate_id',$id)->orderBy('news.id', 'DESC')->take(4)->paginate(2);
    	return view('user.pages.category', compact('cate','category'));
    }
    //detail
    public function getdetail($id)
    {
    	$views = DB::table('news')->select('id', 'views')->where('id', $id)->first();
    	$news = News::find($id);
    	$news->views = $views->views+1;
    	$news->save();

    	$detail = DB::table('news')->join('category', 'category.id', '=', 'news.cate_id')
    		->select('news.*', 'category.name')->where('news.id', $id)->first();
    	$rerate = DB::table('news')
    	->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')
    	->where('news.cate_id', $detail->cate_id)->where('news.id', '<', $id)
    	->orderBy('news.id', 'DESC')->take(3)->get();
    	//prev
    	$prev = DB::table('news')
    	->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')
    	->where('news.cate_id', $detail->cate_id)->where('news.id', '<', $id)
    	->orderBy('news.id', 'DESC')->first();
    	//next
    	$next = DB::table('news')
    	->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')
    	->where('news.cate_id', $detail->cate_id)->where('news.id', '>', $id)
    	->orderBy('news.id', 'DESC')->first();
    	return view('user.pages.detail', compact('detail', 'rerate', 'prev', 'next'));
    	

    }

    public function getsearch(Request $request)
    {	
    	$search = $request->txtsearch;
    	$news = DB::table('news')->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')->where('news.title', 'like', "%$search%")->orWhere('intro', 'like', "%$search%")->orderBy('news.id', 'DESC')->paginate(4);
    	return view('user.pages.search', compact('news', 'search'));
    }
}
