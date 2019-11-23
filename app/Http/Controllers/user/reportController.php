<?php

namespace App\Http\Controllers\user;

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
        $reports = report::orderBy('created_at','DESC')->where(["user_id" =>Auth::id()])->get();
        return view('user.pages.report-problem', compact('reports'));
    }
    public function store(Request $request){
        if(report::create(["problem" => $request->problem,"user_id" => Auth::id()]))
        return back()->with('message','<div class="alert alert-success">Report Added Successfully!</div>');
    }
    public function solved(){
        $reports = report::orderBy('created_at','DESC')->where(["user_id"=>Auth::id(), "status" => "solved"])->get();
        return view('user.pages.report-problem',compact('reports'));
    }
    public function pending(){
        $reports = report::orderBy('created_at','DESC')->where(["user_id"=>Auth::id(), "status" => "pending"])->get();
        return view('user.pages.report-problem',compact('reports'));
    }

    
}