<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class discounts extends Model
{
   	protected $fillable = ['discounts_name', 'discount_in_price', 'is_active'];
}
