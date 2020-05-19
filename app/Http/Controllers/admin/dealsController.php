<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\course;
use App\Models\deals;
use Illuminate\Support\Facades\Redirect;

class dealsController extends Controller
{
    public function index(){
    	$deals = deals::all();
    	// foreach($deals as $key => $value){
    	// 	$serializedArr = deserialize($value->courses_id);
    	// dd($serializedArr);
    	// }
    	
    	return view('admin.pages.deals', compact('deals'));
    }

    public function addDeals(){
    	$courses = course::all();
    	return view('admin.pages.addDeals', compact('courses'));
    }

    public function storeDeal(Request $request){

    	$title = $request->title;
    	$price1 = $request->price1;
    	$price2 = $request->price2;
    	$about1 = $request->about1;
    	$about2 = $request->about2;
    	$about3 = $request->about3;
    	$about4 = $request->about4;
    	$type = $request->typee;
    	$courses_id = $request->courses_id;
    	// $serializedArr = serialize($courses_id);
    	$course_id = json_encode($request->courses_id);

    	$deals = deals::updateOrCreate(["deal_name"=> $title, "bundle_price" => $price1, "deal_price" => $price2, "about1" => $about1, "about2" => $about2, "about3" => $about3, "about4" => $about4, "course_id" => $course_id, "deal_type" => $type]);

    	return redirect()->back()->with('message', 'Deal save successfully');
    }

    public function dealEdit(Request $request, $id){
    	$deal = deals::where('id', $id)->first();
    	$courses = course::all();
    	$edit = "SET";
        return view('admin.pages.addDeals',compact('deal','edit','courses'));
    }

    public function dealUpdate(Request $request){
    	$id = $request->id;
    	$title = $request->title;
    	$price1 = $request->price1;
    	$price2 = $request->price2;
    	$about1 = $request->about1;
    	$about2 = $request->about2;
    	$about3 = $request->about3;
    	$about4 = $request->about4;
    	$courses_id = $request->courses_id;
    	// $serializedArr = serialize($courses_id);
    	$course_id = json_encode($request->courses_id, true);

    	$deals = deals::where('id',$id)->update(["deal_name"=> $title, "bundle_price" => $price1, "deal_price" => $price2, "about1" => $about1, "about2" => $about2, "about3" => $about3, "about4" => $about4, "course_id" => $course_id]);

    	return Redirect::to('admin/deals')->with('message', 'Deal update successfully');
    }

    public function dealDelete(Request $request, $id){
    	$ids = $id + 1;
    	deals::where('id', $ids)->delete();

    	return redirect()->route('admin/deals')->with('message','Deals deleted successfully.');
    }
}
