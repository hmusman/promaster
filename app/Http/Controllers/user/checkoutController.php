<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\deals;
use App\Models\User;

class checkoutController extends Controller
{
    public function index(Request $request){
    	$courses = cart::where("user_id",Auth::id())->whereNotNull('course_id')->get();
    	$ebooks = cart::where("user_id",Auth::id())->whereNotNull('ebook_id')->get();
    	$dealId = $request->dealId;
    	$edit = $request->edit_name;
    	$user = User::where('id', Auth::id())->first();
    	// $dealId = input::get('dealId');
    	// dd($dealId);
    	$deals = deals::where('id', $dealId)->first();
    	return view('home.pages.checkout', compact('courses', 'deals', 'ebooks', 'edit', 'user'));
    }

}
