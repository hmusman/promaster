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
use App\Models\usercourse;
use App\Models\deals;
use App\Models\user;
use App\Models\userdeals;
use PDF;
use App\Http\Controllers\user\traits\activityLog;
use Trexology\ReviewRateable\Models\Rating;
class reviewController extends Controller
{
    public function index(){
    	$pcourse = usercourse::where('user_id', Auth::id())->get();
        $pdeals = userdeals::where('user_id', Auth::id())->whereNotNull('deal_id')->whereNotNull('course_ids')->get();
        // dd($pdeals);
        $CIDS = array();
        $DIDS = array();
        $DCIDS = array();
        $pcourses = NULL;
        $dcourses = NULL;
        if($pcourse->count() > 0){
            foreach($pcourse as $pc){

                $Cids = json_decode($pc->course_id);
                // dd($Cids);
                $CIDS = array_merge($CIDS, $Cids);
            }
        }

        if($pdeals->count() > 0){
            foreach($pdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                // dd($Cids);
                // $DIDS = array_merge($DIDS, $Cids);
                $pdealss = DB::table('userdeals')
                            ->join('deals', 'userdeals.deal_id', '=', 'deals.id')
                            ->select('userdeals.course_ids as courseIDS', 'deals.deal_type as deal_type', 'deals.number_of_course as num_courses')->where('userdeals.deal_id', $Cids)->where('userdeals.user_id', Auth::id())->where('deals.deal_type', 'Course')->get();

                // deals::select('deals.deal_type', 'deals.number_of_course', 'userdeals.course_ids')->join('deals', 'deals.id', '=', 'userdeals.deal_id')->where('deals.deal_type','Course')->where('userdeals.id', $Cids)->first();

                    // dd($pdealss);
                foreach ($pdealss as $deals) {
                    $dcids = json_decode($deals->courseIDS);
                    $DCIDS = array_merge($DCIDS,$dcids);
                }
            }
            // $dcourses = course::whereIn('id', $DCIDS)->get();
        }
        // dd($DCIDS);
        $unique_ids = array_unique(array_merge($DCIDS, $CIDS));
        // dd($unique_ids);
        $pcourses = course::whereIn('id', $unique_ids)->get();

        // dd($pcourses);

        // dd($userCourses,$userDeals);
    	$toBeReviewedCourses = array();
    	foreach($pcourses as $course){
    		$progress = $course->getPercentage($course->id);
    		if($progress == 1){
    			$toBeReviewedCourses[] = (string)$course->id;
    		} 
    	}
        // dd($toBeReviewedCourses);
    	$toBeReviewedCoursesIDS = Rating::whereIn("reviewrateable_id",$toBeReviewedCourses)->where('author_id', Auth::id())->pluck("reviewrateable_id")->toArray(); 
        // dd($toBeReviewedCoursesIDS);
    	$toBeReviewedCourses = array_diff($toBeReviewedCourses,$toBeReviewedCoursesIDS);
        // dd($toBeReviewedCourses);
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
