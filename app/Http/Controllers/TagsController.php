<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use count;

class TagsController extends Controller
{
    public function getlist()
    {
    	$tags = DB::select(DB::raw(' select count(*) as total, news_tags.*, tags.name from `news_tags` right join `tags` on `news_tags`.`tag_id` = `tags`.`id` where `news_tags`.`id` is not null group by `tags`.`name` order by `news_tags`.`id` desc'));
    	return view('admin.tag.list',compact('tags'));
    }
}
