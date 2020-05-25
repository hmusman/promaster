<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userdeals extends Model
{
	protected $table = 'userdeals';
   	protected $fillable = ['user_id', 'deal_id'];
}
