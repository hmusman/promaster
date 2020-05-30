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
class ebookController extends Controller
{
    public function ebooks(){
    	$courses = course::all()->take(10);
    	$totalCourses = course::count();
 
    	return view('home.pages.ebooks',compact('courses','totalCourses'));
    }
    public function trendingEbooks(){
    	$courses = course::all();
    	$totalCourses = course::count();

    	return view('home.pages.trending-ebooks', compact('courses'));
    }
    
    public function ebooksBundles(){

        $featureDeal = deals::where('is_featured', 1)->where('deal_type','ProEbook')->first();
        $deals = deals::where('is_featured', 0)->where('deal_type','ProEbook')->take(4)->get();

        return view('home.pages.ebooksBundles',  compact('featureDeal','deals'));
    }
}
