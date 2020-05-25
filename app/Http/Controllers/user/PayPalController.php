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
    	
    	function parse_mstr($query_string,&$query=array()){
		    $query = $query? $query: array();
		    $params  = explode('&', $query_string);
		    foreach( $params as $param ){
		        $k = $param;
		        $v = '';
		        if(strpos($param,'=')){
		            list($name, $value) = explode('=', $param);
		            $k = rawurldecode($name);
		            $v = rawurldecode($value);
		        }
		        if(array_key_exists($k, $query)){
		            if(is_array($query[$k])){
		                $query[$k][] = $v;
		            }else{
		                $query[$k] = array($query[$k],$v);
		            }
		        }else{
		            $query[$k][] = $v;
		        }
		    }
		}

    	parse_mstr($_SERVER['QUERY_STRING'], $arr);

    	// dd($arr);
    	$ids = $arr['ids'];
    	$dealIDs = $arr['dealIDs'];
    	// dd($ids);
    	// dd($ids);
    	// $total = explode("$",$arr['total']);
    	// $Ftotal = $total[1];
    	// $fprice = (double)str_replace( ',', '', $Ftotal);
    	if(count($ids) > 1 ){
    		$courses = course::whereIn('id', $ids)->get();
	    }else{
	    	$courses = course::where('id', $ids)->get();	
	    }
	    // dd($courses);
    	$deals = deals::where('id', $dealIDs)->get();
    	// $discounts = discounts::where('is_active', 1)->first();
    	// $diss = $discounts->discount_in_price;
    	// dd($diss);
    	// dd($deals);
    	tempData::where('user_id', Auth::id())->delete();
    	tempData::create(["user_id"=>Auth::id(), "course_id" => json_encode($ids, true), "deal_id"=>json_encode($dealIDs, true)]);
        $data = [];
        $data['items'] = [];
        $total = 0;
        if($courses->count() > 0){
	        foreach($courses as $course){

		       $itemDetail = [
		                'name' => $course->course_title,
		                'price' => $course->price,
		                'desc'  => 'You buy this course from Promaster',
		                'qty' => 1
		        ];

		        $data['items'][] =$itemDetail;
		        
	         
		        $total = $total + $course->price;
		        
	        }

        }

        if($deals->count() > 0){
        	foreach ($deals as $deal) {
        
                	$itemDetail = [
        	                'name' => $deal->deal_name,
        	                'price' => $deal->deal_price,
        	                'desc'  => 'You buy this Deal from Promaster',
        	                'qty' => 1
        	        ];
        
        	        $data['items'][] =$itemDetail;
        	        
                 
        	        $total = $total + $deal->deal_price;
                }
        }
        // dd($total);
        // if($diss > 0){

        // 	$total = $total - $diss;

        // }
  		// dd($total);
  		// if($discounts > 0){

  		// 	$total = $total - $discounts;
  		// }
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $total;
  		// dd($data);
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
    	
  		// dd($response);
        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
    	tempData::where('user_id', Auth::id())->delete();
        
        return Redirect::to('home/cart')->with('message', 'Your payment was canceled.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {	
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
