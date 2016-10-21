<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['name', 'alias', 'message', 'news_id', 'user_id'];
    public $timestamps = true;

    public function news()
    {
        return $this->belongTo('App\News');
    }

    public function user()
    {
        return $this->belongTo('App\User');
    }
}
