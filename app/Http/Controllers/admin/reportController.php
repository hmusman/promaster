<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\course;
use App\Models\report;
use App\Models\tableOfContent;
use File;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Response;
use App\Models\userProgress;
use PDF;

class reportController extends Controller
{
    public function index(){
        $reports = report::orderBy('created_at','DESC')->get();
        return view('admin.pages.report-problem',compact('reports'));
    }
    public function changeReportStatus($id){
        report::where("id",$id)->update(["status" => "solved"]);
        return back()->with('message','<div class="alert alert-success">Problem Status Changed Successfully!</div>');
    }
    // public function deleteProblem($id){
    //   report::where("id",$id)->delete();
    //     return back()->with('message','<div class="alert alert-success">Problem Deleted Successfully!</div>'); 
    // }
    public function solved(){
        $reports = report::orderBy('created_at','DESC')->where("status","solved")->get();
        return view('admin.pages.report-problem',compact('reports'));
    }
    public function pending(){
        $reports = report::orderBy('created_at','DESC')->where("status","pending")->get();
        return view('admin.pages.report-problem',compact('reports'));
    }
    
}