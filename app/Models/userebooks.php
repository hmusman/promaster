<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userebooks extends Model
{
	protected $table = 'userebooks';
   	protected $fillable = ['user_id', 'ebook_id'];
}
