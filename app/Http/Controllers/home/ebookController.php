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
class ebookController extends Controller
{
    public function ebooks(){
    	$courses = course::all();
    	$totalCourses = course::count();
 
    	
    	return view('home.pages.ebooks',compact('courses','totalCourses'));
    }
    public function trendingEbooks(){
    	    	
    	return view('home.pages.trending-ebooks');
    }
    
}
