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
use App\Models\userebooks;
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
        $ebook_ids = $request->ebook_ids;
        // dd($ids, $deal_ids, $ebook_ids);
        $dealID = [];
        if(!empty($deal_ids)){
    	   
           $deals = deals::where('id', $deal_ids)->first();
           $dealID[] = (string)$deals->id;
        }

        if($ids != null || !empty($ids))
            usercourse::create(["user_id"=>Auth::id(), "course_id"=>json_encode($ids,true)]);
        if($dealID != null || !empty($dealID)){
            userdeals::create(["user_id"=>Auth::id(), "deal_id"=>json_encode($dealID,true)]);
        }
        if($ebook_ids != null || !empty($ebook_ids)){
            userebooks::create(["user_id"=>Auth::id(), "ebook_id"=>json_encode($ebook_ids,true)]);
        }

        cart::where('user_id', Auth::id())->delete();

        return Redirect::to('/')->with('message', 'Your payment was Successfull.');
        
    }
   
}
