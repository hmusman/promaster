<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use DB;
use Session;
use Redirect;
use Mail;
use Auth;
use App\Models\User;
use App\Models\course;
use App\Models\deals;
use App\Mail\shareCertificateMail;

class shareCertificateController extends Controller
{
	public function shareCertificate(Request $request){
		$request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $course = course::where('id', $request->course_id)->first();
        $courseTitle = str_replace('<br>', ' ', $course->course_title);
        $user = User::where('id', Auth::id())->first();
        $userName = $user->first_name;
        $userEmail = $user->email;
        $usersubject = $userName." just got certification in ".$courseTitle." from Promasters: Global Institute for Professional Studies.";
        $details = [
	        'email' => $request->email,
	        'subject' => $request->subject,
	        'body' =>$request->body,
	        'image' => $course->course_thumbnail,
	        'userName' => $userName,
	        'userEmail' => $userEmail
	      ];

       \Mail::to($request->email)->send(new shareCertificateMail($details, $usersubject));

      	Session::flash('message', 'Certificate successfully shared to the email.');
      return Redirect::back();

    }

}