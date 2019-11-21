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
class indexController extends Controller
{
    public function index(){
    	$courses = course::all();
    	// $user = User::first();
    	$totalCourses = course::count();
   //  	foreach($courses as $course){
   //  		$course->rating([
			//     'title' => 'very useful and informative.i highly recommend it.',
			//     'rating' => 5,
			// ], $user);
   //  	}
    	
    	return view('home.pages.index',compact('courses','totalCourses'));
    }
    
}
