<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
   	protected $table = "problems";
   	
   	public function getUser(){
   	    return $this->hasOne('App\Models\User','id','user_id');
   	}
   	
   	protected $fillable = ["user_id","problem"];
}
