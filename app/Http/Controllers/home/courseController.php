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
class courseController extends Controller
{
    public function index($id){
    	$course = course::where("id",$id)->first();
 
    	
    	return view('home.pages.single-course',compact('course'));
    }
    
}
