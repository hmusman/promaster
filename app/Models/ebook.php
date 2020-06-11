<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
class ebook extends Model
{
    protected $table = "ebooks";

    public function getCourse(){
    	return $this->hasOne('App\Models\course','id','course_id');
    }
}
