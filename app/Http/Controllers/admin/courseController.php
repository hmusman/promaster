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

class courseController extends Controller{
    public function index(){
        $courses = course::orderBy('created_at','DESC')->get();
        return view('admin.pages.courses',compact('courses'));
    }
    public function create(){
       return view('admin.pages.add-course');
    }
    public function store(Request $request){
        if($request->hasfile('course_thumbnail')){
            $file = input::file('course_thumbnail');
            $ext=$file->getClientOriginalExtension();
            $courseThumbnail = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/course-thumbnails/' , $courseThumbnail);   
         }
         if($request->hasfile('certificate_background')){
            $file = input::file('certificate_background');
            $ext=$file->getClientOriginalExtension();
            $certificateBackground = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/certificate-backgrounds/' , $certificateBackground);   
         }

         if($request->hasfile('course_certificate')){
            $file = input::file('course_certificate');
            $ext=$file->getClientOriginalExtension();
            $courseCertificate = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/courses-certificate/' , $courseCertificate);   
         }

         if($request->hasfile('course_view')){
            $file = input::file('course_view');
            $ext=$file->getClientOriginalExtension();
            $courseView = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/courses-view/' , $courseView);   
         }
         
         if($request->hasfile('course_banner')){
            $file = input::file('course_banner');
            $ext=$file->getClientOriginalExtension();
            $courseBanner = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/course-banners/' , $courseBanner);   
         }
         if($request->hasfile('course_ebook')){
            $file = input::file('course_ebook');
            $ext=$file->getClientOriginalExtension();
            $courseEbook = 'Ebook-'.rand(111111111,999999999).'.'.$ext;
            $file->move(public_path().'/courses-ebooks/' , $courseEbook);   
         }
         if($request->hasfile('course_icon')){
            $file = input::file('course_icon');
            $ext=$file->getClientOriginalExtension();
            $courseIcon = 'Icon-'.rand(111111111,999999999).'.'.$ext;
            $file->move(public_path().'/courses-icons/' , $courseEbook);   
         }
         if($request->hasfile('course_video')){
            $file = input::file('course_video');
            $ext=$file->getClientOriginalExtension();
            $courseVideo = 'Video-'.rand(111111111,999999999).'.'.$ext;
            $file->move(public_path().'/courses-videos/' , $courseVideo);  
         }
        $data = array(
            "course_title" => input::get('course_title'),
            "course_description" => input::get('course_description'),
            "price" => input::get('price'),
            "regular_price" => input::get('regular_price'),
            "course_thumbnail" => @$courseThumbnail,
            "course_ebook" => @$courseEbook,
            "course_banner" => @$courseBanner,
            "certificate_background" => @$certificateBackground,
            "course_certificate" => @$courseCertificate,
            "course_view" => @$courseView,
            "course_video" => @$courseVideo,
            "course_icon" => @$courseIcon,
        );
        $result = DB::table('courses')->insert($data);
        if($result){
            $lessonTitle = input::get('lesson_title');
            $courseID = DB::getPdo()->lastInsertId();
            if($request->hasfile('lesson_content')){
                foreach($request->file('lesson_content') as $key => $file){
                    $ext=$file->getClientOriginalExtension();
                    $fileName = md5(rand(1111111111,999999999)).'.'.$ext;
                    $file->move(public_path().'/table-of-content/' , $fileName);
                    $data = array(
                        "course_id" => $courseID,
                        "lesson_title" => @$lessonTitle[$key],
                        "lesson_content" => @$fileName,
                    );
                    DB::table('table_of_content')->insert($data);
                }
            }
            return redirect('admin/courses')->with("message","<div role=\"alert\" class='alert alert-success'>Course Added Successfully</div>");
        }else{return back()->with("message","<div role=\"alert\" class='alert alert-danger'>Something went wrong!</div>");}
    } 
    public function show($id){
       
    }
    public function edit($id){
        $course = course::where("id",$id)->first();
        $edit = "SET";
        return view('admin.pages.add-course',compact('course','edit'));
    }
    public function update(Request $request, $id){
        $course = course::where("id",$id)->first();
        $path = public_path();
        $data = array();
        if($request->hasfile('course_thumbnail')){
            if(File::exists($path.'/course-thumbnails/'.$course->course_thumbnail)) {
                File::delete($path.'/course-thumbnails/'.$course->course_thumbnail);
            }
            $file = input::file('course_thumbnail');
            $ext=$file->getClientOriginalExtension();
            $courseThumbnail = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/course-thumbnails/' , $courseThumbnail); 
            $data["course_thumbnail"] = $courseThumbnail;    
         }
         
         if($request->hasfile('certificate_background')){
            if(File::exists($path.'/certificate-backgrounds/'.$course->certificate_background)) {
                File::delete($path.'/certificate-backgrounds/'.$course->certificate_background);
            }
            $file = input::file('certificate_background');
            $ext=$file->getClientOriginalExtension();
            $certificateBackground = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/certificate-backgrounds/' , $certificateBackground); 
            $data["certificate_background"] = $certificateBackground;    
         }
         if($request->hasfile('course_certificate')){
            if(File::exists($path.'/courses-certificate/'.$course->course_certificate)) {
                File::delete($path.'/courses-certificate/'.$course->course_certificate);
            }
            $file = input::file('course_certificate');
            $ext=$file->getClientOriginalExtension();
            $courseCertificate = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/courses-certificate/' , $courseCertificate); 
            $data["course_certificate"] = $courseCertificate;    
         }
         if($request->hasfile('course_view')){
            if(File::exists($path.'/courses-view/'.$course->course_view)) {
                File::delete($path.'/courses-view/'.$course->course_view);
            }
            $file = input::file('course_view');
            $ext=$file->getClientOriginalExtension();
            $courseView = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/courses-view/' , $courseView); 
            $data["course_view"] = $courseView;    
         }
         if($request->hasfile('course_banner')){
            if(File::exists($path.'/course-banners/'.$course->course_banner)) {
                File::delete($path.'/course-banners/'.$course->course_banner);
            }
            $file = input::file('course_banner');
            $ext=$file->getClientOriginalExtension();
            $courseBanner = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/course-banners/' , $courseBanner); 
            $data["course_banner"] = $courseBanner;    
         }
         if($request->hasfile('course_ebook')){
            if(File::exists($path.'/courses-ebooks/'.$course->course_ebook)) { 
                File::delete($path.'/courses-ebooks/'.$course->course_ebook);
            }
            $file = input::file('course_ebook');
            $ext=$file->getClientOriginalExtension();
            $courseEbook = 'Ebook-'.rand(111111111,999999999).'.'.$ext;
            $file->move(public_path().'/courses-ebooks/' , $courseEbook);
            $data["course_ebook"] = $courseEbook;  
         }
         if($request->hasfile('course_icon')){
            if(File::exists($path.'/courses-icons/'.$course->course_icon)) { 
                File::delete($path.'/courses-icons/'.$course->course_icon);
            }
            $file = input::file('course_icon');
            $ext=$file->getClientOriginalExtension();
            $courseIcon = 'Icon-'.rand(111111111,999999999).'.'.$ext;
            $file->move(public_path().'/courses-icons/' , $courseIcon);
            $data["course_icon"] = $courseIcon;  
         }
         if($request->hasfile('course_video')){
            if(File::exists($path.'/courses-videos/'.$course->course_video)) { 
                File::delete($path.'/courses-videos/'.$course->course_video);
            }

            $file = input::file('course_video');
            $ext=$file->getClientOriginalExtension();
            $courseVideo = 'Video-'.rand(111111111,999999999).'.'.$ext;
            $file->move(public_path().'/courses-videos/' , $courseVideo);

            $data["course_video"] = $courseVideo;  
         }

        $data["course_title"] = input::get('course_title');
        $data["course_description"] = input::get('course_description');
        $data["price"] = input::get('price');
        $data["regular_price"] = input::get('regular_price');
        DB::table('courses')->where("id",$id)->update($data);
        $contentIDs = input::get('content_ids');
        // 
        $temp = DB::table('table_of_content')->where("course_id",@$id)->get(["id"]);
        $arr1 = array();
        foreach($temp as $value){
            $arr1 [] = $value->id;
        }
        $result=array_values(array_diff($arr1,$contentIDs));
        foreach($result as $value){
            $temp = tableOfContent::select(["lesson_content"])->where("id",$value)->first();
            tableOfContent::select(["lesson_content"])->where("id",$value)->delete();
            if(File::exists($path.'/table-of-content/'.$temp->lesson_content)) { 
                File::delete($path.'/table-of-content/'.$temp->lesson_content);
            }
        }
        // 
        $lessonTitle = input::get('lesson_title');
        $lessonContent = $request->file('lesson_content');
        foreach($lessonTitle as $key => $title){
            $data = array();
            if(@$lessonContent[$key]){
                $coursetableOfContent = tableOfContent::select(["lesson_content"])->where("id",@$contentIDs[$key])->first();
                if(!is_null($coursetableOfContent)){
                    if(File::exists($path.'/table-of-content/'.$coursetableOfContent->lesson_content)) { 
                        File::delete($path.'/table-of-content/'.$coursetableOfContent->lesson_content);
                    }
                }
                $ext=$lessonContent[$key]->getClientOriginalExtension();
                $fileName = md5(rand(1111111111,999999999)).'.'.$ext;
                $lessonContent[$key]->move(public_path().'/table-of-content/' , $fileName);
                $data["lesson_content"] = @$fileName;

            }
            $data["lesson_title"] = $title;
            $response = DB::table('table_of_content')->where("id",@$contentIDs[$key])->first();
            if(!is_null($response)){
                DB::table('table_of_content')->where("id",@$contentIDs[$key])->update($data);
            }else{
                $data["course_id"] = $id;
                $response = DB::table('table_of_content')->insert($data);
            }
        }
        return back()->with("message","<div role=\"alert\" class='alert alert-success'>Course Updated Successfully</div>");
    }
    public function destroy($id){
        $course = course::where("id",$id)->first();
        $coursetableOfContent = tableOfContent::where("course_id",$id)->get(["lesson_content"]);
        $result = course::where("id",$id)->delete();
        if($result){
            $path = public_path();
            if(File::exists($path.'/course-thumbnails/'.$course->course_thumbnail)) {
                File::delete($path.'/course-thumbnails/'.$course->course_thumbnail);
            }
            if(File::exists($path.'/course-banners/'.$course->course_banner)) {
                File::delete($path.'/course-banners/'.$course->course_banner);
            }
            if(File::exists($path.'/courses-ebooks/'.$course->course_ebook)) { 
                File::delete($path.'/courses-ebooks/'.$course->course_ebook);
            }
            if(File::exists($path.'/certificate-backgrounds/'.$course->certificate_background)) { 
                File::delete($path.'/certificate-backgrounds/'.$course->certificate_background);
            }
            foreach($coursetableOfContent as $content){
                if(File::exists($path.'/table-of-content/'.$content->lesson_content)) { 
                    File::delete($path.'/table-of-content/'.$content->lesson_content);
                }
            }
            return back()->with("message","<div role=\"alert\" class='alert alert-success'>Course Dleted Successfully!</div>");
        }else{return back();}
    }
}
