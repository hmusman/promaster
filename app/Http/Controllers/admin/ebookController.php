<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\ebook;
use App\Models\course;
use App\Models\certificate;
use App\Models\tableOfContent;
use File;

class ebookController extends Controller{
    public function index(){
        $ebooks = ebook::orderBy('created_at','DESC')->get();
        return view('admin.pages.ebooks',compact('ebooks'));
    }
    public function create(){
        $courses = course::all();
       return view('admin.pages.add-ebook', compact('courses'));
    }
    public function store(Request $request){
        if($request->hasfile('ebook_thumbnail')){
            $file = input::file('ebook_thumbnail');
            $ext=$file->getClientOriginalExtension();
            $ebookThumbnail = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/ebook-thumbnails/' , $ebookThumbnail);   
         }
        $data = array(
            "ebook_title" => input::get('ebook_title'),
            "ebook_description" => input::get('ebook_description'),
            "ebook_price" => input::get('price'),
            "course_id" => $request->course,
            "ebook_thumbnail" => @$ebookThumbnail,
        );
        dd($data);
        $result = DB::table('ebooks')->insert($data);
        if($result){
            return redirect('admin/ebooks')->with("message","<div role=\"alert\" class='alert alert-success'>Ebook Added Successfully</div>");
        }else{
            return back()->with("message","<div role=\"alert\" class='alert alert-danger'>Something went wrong!</div>");}
    } 
    public function show($id){
       
    }
    public function edit($id){
         $courses = course::all();
        $ebook = ebook::where("id",$id)->first();
        $edit = "SET";
        return view('admin.pages.add-ebook',compact('ebook','edit', 'courses'));
    }
    public function update(Request $request, $id){
        $ebook = ebook::where("id",$id)->first();
        $path = public_path();
        $data = array();
        if($request->hasfile('ebook_thumbnail')){
            if(File::exists($path.'/ebook-thumbnails/'.$ebook->ebook_thumbnail)) {
                File::delete($path.'/ebook-thumbnails/'.$ebook->ebook_thumbnail);
            }
            $file = input::file('ebook_thumbnail');
            $ext=$file->getClientOriginalExtension();
            $ebookThumbnail = md5(rand(1111111111,999999999)).'.'.$ext;
            $file->move(public_path().'/ebook-thumbnails/' , $ebookThumbnail); 
            $data["ebook_thumbnail"] = $ebookThumbnail;    
         }

        $data["ebook_title"] = input::get('ebook_title');
        $data["ebook_description"] = input::get('ebook_description');
        $data["ebook_price"] = input::get('price');
        $data["course_id"] = $request->course;
        // dd($data);
        DB::table('ebooks')->where("id",$id)->update($data);

        return back()->with("message","<div role=\"alert\" class='alert alert-success'>Ebook Updated Successfully</div>");
    }
    public function destroy($id){
        $ebook = ebook::where("id",$id)->first();
        $result = ebook::where("id",$id)->delete();
        if($result){
            $path = public_path();
            if(File::exists($path.'/ebook-thumbnails/'.$ebook->ebook_thumbnail)) {
                File::delete($path.'/ebook-thumbnails/'.$ebook->ebook_thumbnail);
            }

            return back()->with("message","<div role=\"alert\" class='alert alert-success'>Ebook Dleted Successfully!</div>");
        }else{return back();}
    }
}
