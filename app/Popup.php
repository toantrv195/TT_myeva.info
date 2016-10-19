<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    //
    protected $table='popups';
	protected $fillable=['name','alias','image','url','p_check'];
	public $timestamps = true;

}
