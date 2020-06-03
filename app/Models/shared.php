<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shared extends Model
{
   	protected $table = "shared";
   	protected $fillable = [
        'user_id','course_id','is_shared',
    ];
}
