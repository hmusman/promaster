<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use DB;
use Session;
use Redirect;
use Mail;
use App\Models\User;
use App\Models\course;
use App\Models\deals;
use App\Models\userdeals;
use App\Models\usercourse;
use Auth;
use App\Mail\ContactMail;
class indexController extends Controller
{
    public function index(){
    	$courses = course::all();
    	// $user = User::first();
      $pcourse = usercourse::where('user_id', Auth::id())->get();
       $pdeals = userdeals::where('user_id', Auth::id())->whereNotNull('deal_id')->whereNotNull('course_ids')->get();
    // dd($pdeals);
      $CIDS = array();
      $DCIDS = array();

      if($pcourse->count() > 0){
            foreach($pcourse as $pc){

                $Cids = json_decode($pc->course_id);
                // dd($Cids);
                $CIDS = array_merge($CIDS, $Cids);
            }

            // $pcourses = course::whereIn('id', $CIDS)->get();
        }
      if($pdeals->count() > 0){
            foreach($pdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                // dd($Cids);
                // $DIDS = array_merge($DIDS, $Cids);
                $pdealss = DB::table('userdeals')
                            ->join('deals', 'userdeals.deal_id', '=', 'deals.id')
                            ->select('userdeals.course_ids as courseIDS', 'deals.deal_type as deal_type', 'deals.number_of_course as num_courses')->where('userdeals.deal_id', $Cids)->where('userdeals.user_id', Auth::id())->where('deals.deal_type', 'Course')->get();

                    // dd($pdealss);
                foreach ($pdealss as $deals) {
                    $dcids = json_decode($deals->courseIDS);
                    $DCIDS = array_merge($DCIDS,$dcids);
                }
            }
            // $dcourses = course::whereIn('id', $DCIDS)->get();
        }
      $ids =  array_unique(array_merge($DCIDS, $CIDS));
      // dd($ids);
    	$totalCourses = course::count();
      $featureDeal = deals::where('is_featured', 1)->first();
      $deals = deals::where('is_featured', 0)->take(4)->get();
   //  	foreach($courses as $course){
   //  		$course->rating([
			//     'title' => 'very useful and informative.i highly recommend it.',
			//     'rating' => 5,
			// ], $user);
   //  	}
     

    	return view('home.pages.index',compact('courses','totalCourses','featureDeal','deals', 'ids'));
    }

    public function contactUs(){
      return view('home.pages.contactUs');
    }

    public function sendMessage(Request $request){
      $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

      $details = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' =>$request->message
      ];
      // dd($details);

      \Mail::to('info@promastersgips.com')->send(new ContactMail($details));

      Session::flash('message', "Your message was sent, we will get back to you soon, have a nice day!");
      return Redirect::back();
    }
    
}
