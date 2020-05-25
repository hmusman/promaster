<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\deals;

class dealsController extends Controller
{
    public function index(){
    	$featureDeal = deals::where('is_featured', 1)->where('deal_type', 'Course')->first();
      	$deals = deals::where('is_featured', 0)->where('deal_type', 'Course')->take(4)->get();

    	return view('user.pages.deals', compact('featureDeal','deals'));
    }

    public function proDeals(){
    	$featureDeal = deals::where('is_featured', 1)->where('deal_type','ProEbook')->first();
      	$deals = deals::where('is_featured', 0)->where('deal_type','ProEbook')->take(4)->get();

    	return view('user.pages.deals', compact('featureDeal','deals'));
    }
}
