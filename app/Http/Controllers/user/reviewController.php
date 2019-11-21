<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\course;
use App\Models\tableOfContent;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Response;
use App\Models\userProgress;
use App\Models\user;
use PDF;
use App\Http\Controllers\user\traits\activityLog;
use Trexology\ReviewRateable\Models\Rating;
class reviewController extends Controller
{
    public function index(){
    	$allCourses = course::select("id")->get();
    	$toBeReviewedCourses = array();
    	foreach($allCourses as $course){
    		$progress = $course->getPercentage($course->id);
    		if($progress == 1){
    			$toBeReviewedCourses[] = $course->id;
    		} 
    	}
    	$toBeReviewedCoursesIDS = Rating::whereIn("reviewrateable_id",$toBeReviewedCourses)->pluck("reviewrateable_id")->toArray(); 
    	$toBeReviewedCourses = array_diff($toBeReviewedCourses,$toBeReviewedCoursesIDS);
		$courses = course::whereIn("id",$toBeReviewedCourses)->get();
    	return view('user.pages.reviews',compact('courses'));
    }
    public function reviewHistory(){
    	$reviews = Rating::where("author_id",Auth::id())->orderBy("created_at","DESC")->get();
    	return view('user.pages.reviews',compact('reviews'));
    }
    public function createReview(Request $request){
    	$user = User::find(Auth::id());
    	$course = course::find($request->id);
    	$course->rating([
		    'title' => $request->body ,
		    'rating' => $request->rating,
		], $user);
		return back()->with('message','<div style="margin-top:-15px;" class="alert alert-success">Review Submitted Successfully.</div>');
    }
}
