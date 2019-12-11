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
use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;
use Response;
use App\Models\userProgress;
use PDF;
use App\Notifications\reportNotification;
use App\Notifications\adminReportNotification;


class reportController extends Controller
{
    public function index(){
        $reports = report::orderBy('created_at','DESC')->where(["user_id" =>Auth::id()])->get();
        return view('user.pages.report-problem', compact('reports'));
    }
    public function store(Request $request){
        $report = report::create(["problem" => $request->problem,"user_id" => Auth::id()]);
        $reportID = $report->id;
        $userID = Auth::user();
        if($userID)
            $username = @$userID->first_name.' '.@$userID->last_name;
            Auth::user()->notify(new reportNotification($username));
            $admin = Admin::where("id", ">", 0)->first();
            $admin->notify(new adminReportNotification($username, $reportID));
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

     public function singleReport($id){
        $reports = report::where("id", $id)->get();

        if(isset(auth()->user()->unreadNotifications[0]->id)){
            $nid = auth()->user()->unreadNotifications[0]->id;
            auth()->user()->unreadNotifications->where('id', $nid)->markAsRead();
        }

        return view('user.pages.report-problem',compact('reports'));
    }
}