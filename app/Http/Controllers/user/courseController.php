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
use App\Models\userdeals;
use App\Models\deals;
use PDF;
use App\Http\Controllers\user\traits\activityLog;

class courseController extends Controller
{
    use activityLog;
    public $course = null;
    public function __construct(course $course){
        $this->middleware('verified');
        $this->course = $course;
    }
    
    public function courses(){
    	$courses = course::all();
        $pcourse = usercourse::where('user_id', Auth::id())->get();
        $pdeals = userdeals::where('user_id', Auth::id())->get();
        $CIDS = array();
        $DIDS = array();
        $DCIDS = array();
        $pcourses = NULL;
        $dcourses = NULL;
        if($pcourse->count() > 0){
            foreach($pcourse as $pc){

                $Cids = json_decode($pc->course_id);
                $CIDS = array_merge($CIDS, $Cids);
            }

            $pcourses = course::whereIn('id', $CIDS)->get();
        }
        if($pdeals->count() > 0){
            foreach($pdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                $DIDS = array_merge($DIDS,$Cids);
            }

            $pdealss = deals::where('deal_type','Course')->whereIn('id', $DIDS)->get();
            // dd($pdealss);
            foreach ($pdealss as $deals) {
                $dcids = json_decode($deals->course_id);

                $DCIDS = array_merge($DCIDS,$dcids);
            }
            $dcourses = course::whereIn('id', $DCIDS)->get();
        }
        // dd($dcourses);
        // dd($DCIDS, $CIDS, $DIDS);

    	return view('user.pages.courses',compact('courses', 'pcourses', 'dcourses'));
    }
    public function courseDetails($id){
    	$course = course::where("id",$id)->first();
    	return view('user.pages.course-details',compact('course'));
    }
    public function ebooks(){
    	$courses = course::all();
        $pcourse = usercourse::where('user_id', Auth::id())->get();
        $pdeals = userdeals::where('user_id', Auth::id())->get();
        $CIDS = array();
        $DIDS = array();
        $DCIDS = array();
        $pcourses = NULL;
        $dcourses = NULL;
        if($pcourse->count() > 0){
            foreach($pcourse as $pc){

                $Cids = json_decode($pc->course_id);
                $CIDS = array_merge($CIDS, $Cids);
            }

            $pcourses = course::whereIn('id', $CIDS)->get();
        }
        if($pdeals->count() > 0){
            foreach($pdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                $DIDS = array_merge($DIDS,$Cids);
            }

            $pdealss = deals::where('deal_type', 'ProEbook')->whereIn('id', $DIDS)->get();
            // dd($pdealss);
            foreach ($pdealss as $deals) {
                $dcids = json_decode($deals->course_id);

                $DCIDS = array_merge($DCIDS,$dcids);
            }
            $dcourses = course::whereIn('id', $DCIDS)->get();
        }
    	return view('user.pages.ebooks',compact('courses', 'pcourses', 'dcourses'));
    }
    public function certificates(){
    	$courses = course::all();
        $pcourse = usercourse::where('user_id', Auth::id())->get();
        $pdeals = userdeals::where('user_id', Auth::id())->get();
        $CIDS = array();
        $DIDS = array();
        $DCIDS = array();
        $pcourses = NULL;
        $dcourses = NULL;
        if($pcourse->count() > 0){
            foreach($pcourse as $pc){

                $Cids = json_decode($pc->course_id);
                $CIDS = array_merge($CIDS, $Cids);
            }

            $pcourses = course::whereIn('id', $CIDS)->get();
        }
        if($pdeals->count() > 0){
            foreach($pdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                $DIDS = array_merge($DIDS,$Cids);
            }

            $pdealss = deals::whereIn('id', $DIDS)->get();
            foreach ($pdealss as $deals) {
                $dcids = json_decode($deals->course_id);

                $DCIDS = array_merge($DCIDS,$dcids);
            }
            $dcourses = course::whereIn('id', $DCIDS)->get();
        }
    	return view('user.pages.certificates',compact('courses', 'pcourses', 'dcourses'));
    }
    
    public function download(Request $request){
        $course = course::select(["course_ebook"])->where("id",Crypt::decrypt($request->id))->first();
        $fileype = explode(".",$course->course_ebook);
        $file= public_path().'/courses-ebooks/'.$course->course_ebook;
        $headers = array(
                  'Content-Type: application/'.$fileype[1].'',
                );
        return Response::download($file,mt_rand(11111,99999).'-'.$course->course_ebook,$headers);
    }
    public function downloadCertificate(Request $request){
    	$course = course::select(["course_title","certificate_background"])->where("id",Crypt::decrypt($request->id))->first();
        if($course->getPercentage(Crypt::decrypt($request->id)) == 1){
            $this->createActivity(Auth::id(),'download_certificate','Download certificate');
            return view('user/pages/certificate-template.template',compact('course'));
        }else{
            abort(401);
        }
    }
    public function markComplete(Request $request){
        $obj = userProgress::where(["user_id"=>Auth::id(),"content_id"=>$request->contentID,"status"=>1])->first();
        userProgress::firstOrCreate(["user_id"=>Auth::id(),"content_id"=>$request->contentID,"status"=>1]);
        if(is_null($obj)){
            $courseId = tableOfContent::where("id",$request->contentID)->first(["course_id"]);
            $course = new course();
            return $course->getPercentage($courseId->course_id);
        }else{
            return "false";
        }
        
    }
    public function logCourseComplete(Request $request){
        $this->createActivity(Auth::id(),'course_complete','Completed course <strong>'.$this->course->course($request->id)->course_title.'</strong>');
        $data = '<a href="'.url("user/download-certificate").'" onclick="event.preventDefault();document.getElementById(\'download-certificate\').submit();" target="_blank" class="btn-d gradiant"><i class="fa fa-download mr-2" aria-hidden="true"></i>Certificate</a>
        <a href="'.url("user/download").'" onclick="event.preventDefault();document.getElementById(\'download-ebook\').submit();" class="btn-d gradiant" style="margin:0px !important;"><i class="fa fa-download mr-2" aria-hidden="true"></i>Ebook</a>
        <form id="download-certificate" target="_blank" action="'.url("user/download-certificate").'" method="post">
          <input type="hidden" name="_token" value="'.csrf_token().'">
          <input type="hidden" name="id" value="'.Crypt::encrypt($request->id).'">
        </form>
        <form id="download-ebook" action="'.url("user/download").'" method="post">
          <input type="hidden" name="_token" value="'.csrf_token().'">
          <input type="hidden" name="id" value="'.Crypt::encrypt($request->id).'">
        </form>';
        return $data;
    }
}
