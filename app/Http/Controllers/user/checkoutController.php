<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\deals;

class checkoutController extends Controller
{
    public function index(Request $request){
    	$courses = cart::where("user_id",Auth::id())->get();
    	$dealId = $request->dealId;
    	// $dealId = input::get('dealId');
    	// dd($dealId);
    	$deals = deals::where('id', $dealId)->first();
    	return view('home.pages.checkout', compact('courses', 'deals'));
    }

}
