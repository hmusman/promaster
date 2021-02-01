<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscribers extends Model
{
    protected $table = "subscribers";
    public $timestamps = false;
    protected $fillable = [
        'email',
    ];
}
