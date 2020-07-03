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
use App\Http\Controllers\user\traits\activityLog;


class shareCertificateController extends Controller
{
    use activityLog;
    public $course = null;
    public function __construct(course $course){
        $this->middleware('verified');
        $this->course = $course;
    }
    public function createCertificate(Request $request){
        // dd('here...');
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
        $recipientemail = $request->email;
        $subject = $request->subject;
        $body =$request->body;
        $image = $course->course_thumbnail;
        $userName = $userName;
        $userEmail = $userEmail;

        $course_id = $request->course_id;
        // dd($courseTitle,
        //     $userName,
        //     $userEmail,
        //     $usersubject,$recipientemail,
        //     $subject,
        //     $body,
        //     $image,
        //     $userName,
        //     $userEmail);
        $course = course::select(["id", "course_title","certificate_background"])->where("id",$request->course_id)->first();
        if($course->getPercentage($request->course_id) == 1){
            $this->createActivity(Auth::id(),'download_certificate','Download certificate');
            return view('user/pages/certificate-template.shareCertificate-template',compact('course','course_id','courseTitle','userName','userEmail','usersubject','recipientemail','subject','body','image','userName','userEmail'));
        }else{
            abort(401);
        }
    }
    public function saveImage(Request $request){

        define('UPLOAD_DIR', public_path().'/temp-image/');  //Upload folder
        $img = $request->get('imgBase64');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        $file = UPLOAD_DIR . Auth::id() .'.png';
        $fImage = file_put_contents($file, $fileData);
        if($fImage){
            $data = "Done";
        }
        else{
            $data="false";
        }
        
        return $data;
    }

	public function shareCertificate(Request $request){

        $courseId = $request->courseId;
        $title = $request->title;
        $userName = $request->userName;
        $userEmail = $request->userEmail;
        $usersubject = $request->usersubject;
        $recipientemail = $request->recipientemail;
        $subject = $request->subject;
        $body = $request->body;
        $image = $request->image;

        $certificate = public_path().'/temp-image/'. Auth::id() . '.png';
        // dd($courseId,
        //     $title,
        //     $userName,
        //     $userEmail,
        //     $usersubject,
        //     $recipientemail,
        //     $subject,
        //     $body,
        //     $image,
        // $certificate);

         $data = [
            'document' => $certificate
        ];
        // dd($data);
       //  $course = course::where('id', $request->course_id)->first();
       //  $courseTitle = str_replace('<br>', ' ', $course->course_title);
       //  $user = User::where('id', Auth::id())->first();
       //  $userName = $user->first_name;
       //  $userEmail = $user->email;
       //  $usersubject = $userName." just got certification in ".$courseTitle." from Promasters: Global Institute for Professional Studies.";
        $details = [
	        'email' => $recipientemail,
	        'subject' => $usersubject,
	        'body' => $body,
	        'image' => $image,
	        'userName' => $userName,
	        'userEmail' => $userEmail
	      ];

       \Mail::to($recipientemail)->send(new shareCertificateMail($details, $usersubject, $data, $title));

      	// Session::flash('message', 'Certificate successfully shared to the email.');
      // return Redirect::back();
       return "true";

    }

}