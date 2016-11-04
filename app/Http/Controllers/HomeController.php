<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\News;
use Session;
use App;
class HomeController extends Controller
{
   
    public function index()
    {
        $news = DB::table('news')
            ->join('category', 'category.id', '=', 'news.cate_id')
            ->select('news.*', 'category.name')->orderBy('news.id', 'DESC')->paginate(6);
        
        return view('user.pages.home', compact('news'));
    }
    //category
    public function getcate($alias)
    {   
        $category = DB::table('category')->select('id', 'name', 'alias')->where('alias', $alias)->first();
        $cate = DB::table('news')->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')->where('cate_id',$category->id)->orderBy('news.id', 'DESC')->take(4)->paginate(2);
        return view('user.pages.category', compact('cate','category'));
    }
    //detail
    public function getdetail($id)
    {
        $views = DB::table('news')->select('id', 'views')->where('id', $id)->first();
        $news = News::find($id);
        if(!Session::has('ISREAD'.$id))
        {
            Session::put('ISREAD'.$id, 'value');
            $news->views +=1;
        }
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

    //contact
    public function postcontact(Request $request)
    {
        $data = ['name'=> $request->input('txtsearch')];
        Mail::send('user.mail',$data,function($msg){
            $msg->from('toantv@zergitas.com','trieu toan');
            $msg->to('trieutoan2095@gmail.com','conan')->subject('day la mail lien he');
        });

        /*Mail::send('user.mail', array('name'=>$request->input["txtsearch"]), function($message)
            {
                $message->to('plachym.it@gmail.com', 'Visitor')->subject('Visitor Feedback!');      
            });*/

        echo"<script>
            alert('Cám ơn bạn đã góp ý. Chúng thôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
            window.location = '".url('/')."'
        </script>";
    }
}
