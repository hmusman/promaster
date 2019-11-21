<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\course;
use App\Models\User;
use App\Models\certificate;
use App\Models\tableOfContent;
use BrightNucleus\CountryCodes\Country;
use File;
use Spatie\Activitylog\Models\Activity;
class indexController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}
	public function logs($id){
		$logs = Activity::where("causer_id",$id)->orderBy("created_at","DESC")->get();
		return view("admin.pages.users",compact("logs"));
	}
    public function index(){
    	$totalUsers = User::count();
    	$totalCourses = course::count();
    	$newUsers = User::latest()->take(10)->get();
    	return view("admin.pages.dashboard",compact('totalUsers','newUsers','totalCourses'));
    }
    public function users(){
        $users = User::all();
    	return view("admin.pages.users",compact('users'));
    }
}
