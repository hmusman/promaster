<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usercourse extends Model
{
	protected $table = 'usercourse';
   	protected $fillable = ['user_id', 'course_id'];
}
