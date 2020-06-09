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
        $dealID = [];
        if(!empty($deal_ids)){
    	   
           $deals = deals::where('id', $deal_ids)->first();
           $dealID[] = (string)$deals->id;
        }
        // dd($dealID, $ids);
    	tempData::where('user_id', Auth::id())->delete();
        if(!empty($ids) && !empty($deals)){

            tempData::create(["user_id"=>Auth::id(), "course_id" => json_encode($ids, true), "deal_id"=>json_encode($dealID, true)]);
        }
        if(!empty($deals) && empty($ids)){

    	   tempData::create(["user_id"=>Auth::id(), "deal_id"=>json_encode($dealID, true)]);
        }
        if(empty($deals) && !empty($ids)){

           // tempData::create(["user_id"=>Auth::id(), "deal_id"=>json_encode($deals, true)]);
            tempData::create(["user_id"=>Auth::id(), "course_id" =>json_encode($ids, true)]);
        }

        $userData = tempData::first();
        $course_id = json_decode($userData->course_id);
        $deal_id = json_decode($userData->deal_id);
        $user_id  = $userData->user_id;
        // dd($course_id, $deal_id, $user_id);
        if($course_id != null || !empty($course_id))
        usercourse::create(["user_id"=>$user_id, "course_id"=>json_encode($course_id,true)]);
        if($deal_id != null || !empty($deal_id)){
            userdeals::create(["user_id"=>$user_id, "deal_id"=>json_encode($deal_id,true)]);
        }

        tempData::where('user_id', $user_id)->delete();
        cart::where('user_id', $user_id)->delete();

        return Redirect::to('/')->with('message', 'Your payment was Successfull.');
        
    }
   
}
