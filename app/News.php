<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'alias', 'image', 'intro', 'content', 'views', 'likes', 'hot_news', 'url', 'user_id', 'cate_id'];
    public $timestamps = true;

    public function comment()
    {
        return $this->HasMany('App\Comment');
    }

    public function category()
    {
        return $this->belongTo('App\Category');
    }

    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function tag()
    {
        return $this->HasMany('App\Tag');
    }
}
