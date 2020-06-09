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
use App\Mail\ContactMail;
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

    public function contactUs(){
      return view('home.pages.contactUs');
    }

    public function sendMessage(Request $request){
      $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email',
            'subject' => 'required|min:20',
            'message' => 'required|min:150',
        ]);

      $details = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' =>$request->message
      ];
      // dd($details);

      \Mail::to('info@promastersgips.com')->send(new ContactMail($details));

      Session::flash('message', "Special thanks for contacting us.");
      return Redirect::back();
    }
    
}
