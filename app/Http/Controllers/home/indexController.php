<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use DB;
use App\Models\User;
use App\Models\course;
use App\Models\deals;
class indexController extends Controller
{
    public function index(){
    	$courses = course::all();
    	// $user = User::first();
    	$totalCourses = course::count();
      $featureDeal = deals::where('is_featured', 1)->first();
      $deals = deals::where('is_featured', 0)->take(4)->get();
   //  	foreach($courses as $course){
   //  		$course->rating([
			//     'title' => 'very useful and informative.i highly recommend it.',
			//     'rating' => 5,
			// ], $user);
   //  	}
    	
    	return view('home.pages.index',compact('courses','totalCourses','featureDeal','deals'));
    }
    
}
