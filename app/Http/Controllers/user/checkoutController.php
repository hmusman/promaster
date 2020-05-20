<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class checkoutController extends Controller
{
    public function index(){
    	$courses = cart::where("user_id",Auth::id())->get();
    	return view('home.pages.checkout', compact('courses'));
    }

}
