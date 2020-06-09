<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\course;
use App\Models\discounts;
use Illuminate\Support\Facades\Auth;
use App\Models\deals;
use App\Models\tempData;
use App\Models\userdeals;
use App\Models\usercourse;
use App\Models\cart;
use Illuminate\Support\Facades\Redirect;



class PayPalController extends Controller
{
    public function payment(Request $request)
    {
    	// dd('i am here...........');
        // dd($request->course_ids, $request->deal_ids);
        $ids = $request->course_ids;
        $deal_ids = $request->deal_ids;
        // dd($ids, $deal_ids);
    	if(count($ids) > 1 ){
    		$courses = course::whereIn('id', $ids)->get();
	    }else{
	    	$courses = course::where('id', $ids)->get();	
	    }
	    // dd($courses);
        if(!empty($deal_ids)){
    	   
           $deals = deals::where('id', $deal_ids)->get();

        }

    	tempData::where('user_id', Auth::id())->delete();
        if(!empty($deals)){

    	   tempData::create(["user_id"=>Auth::id(), "course_id" => json_encode($ids, true), "deal_id"=>json_encode($deals, true)]);
        }
        else{
            tempData::create(["user_id"=>Auth::id(), "course_id" => json_encode($ids, true)]);
        }

        $userData = tempData::first();
        $course_id = json_decode($userData->course_id);
        $deal_id = json_decode($userData->deal_id);
        $user_id  = $userData->user_id;
        // dd($course_id, $deal_id, $user_id);
        usercourse::create(["user_id"=>$user_id, "course_id"=>json_encode($course_id,true)]);
        userdeals::create(["user_id"=>$user_id, "deal_id"=>json_encode($deal_id,true)]);

        tempData::where('user_id', $user_id)->delete();
        cart::where('user_id', $user_id)->delete();

        return Redirect::to('/')->with('message', 'Your payment was Successfull.');
        
    }
   
}
