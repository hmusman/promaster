<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userProgress extends Model
{
    protected $table = "user_progress";
    public $timestamps = false;

    protected $fillable = ["user_id","content_id","status"];
}
