<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\course;
use App\Models\certificate;
use App\Models\tableOfContent;
use File;
use App\Http\Controllers\user\traits\activityLog;
use Trexology\ReviewRateable\Models\Rating;
class reviewController extends Controller{
    public function index(){
        $courses = course::orderBy('created_at','DESC')->get();
        return view('admin.pages.reviews',compact('courses'));
    }
    public function reviews($id){
        $reviews = Rating::where("reviewrateable_id",$id)->get();
        return view('admin.pages.reviews',compact('reviews'));
    }
}