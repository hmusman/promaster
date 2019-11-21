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
        return view('user.pages.report-problem');
    }
    public function store(Request $request){
        if(report::create(["problem" => $request->problem,"user_id" => Auth::id()]))
        return back()->with('message','<div class="alert alert-success">Report Added Successfully!</div>');
    }
}