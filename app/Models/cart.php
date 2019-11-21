<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = "cart";
    public $timestamps = false;
    protected $fillable = [
        'user_id','course_id'
    ];


    public function getCourse(){
    	return $this->hasOne('App\Models\course','id','course_id');
    }
}
