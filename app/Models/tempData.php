<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tempData extends Model
{
	protected $table = 'tamp_data';
   	protected $fillable = ['user_id', 'course_id', 'deal_id'];
}