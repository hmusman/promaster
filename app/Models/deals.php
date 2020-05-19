<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class deals extends Model
{
   	protected $fillable = ['deal_name', 'bundle_price', 'deal_price', 'about1', 'about2', 'about3', 'about4', 'is_featured', 'course_id','deal_type'];
}
