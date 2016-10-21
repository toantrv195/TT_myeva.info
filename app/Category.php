<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name', 'alias', 'parent_id'];
    public $timestamps = true;

    public function news()
    {
        return $this->HasMany('App\News');
    }
}
