<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function news()
    {
        return $this->belongsToMany('App\News');
    }
}
