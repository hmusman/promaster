<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tokens extends Model
{
   	protected $table = "tokens";
   	protected $fillable = [
        'user_id','token',
    ];
}
