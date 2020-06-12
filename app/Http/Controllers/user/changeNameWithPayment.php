<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use App\Models\tempData;
use Srmklive\PayPal\Services\ExpressCheckout;

class changeNameWithPayment extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'Change Your Name',
                'price' => 30,
                'desc'  => 'You can change your name within 24 hours after paying $30',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 30;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        return Redirect::back()->with('message', 'You cancel your payment for change name. It would not allow you changr your name.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        	tempData::where('user_id', Auth::id())->delete();
        	tempData::create(['user_id'=>Auth::id(), 'edit_name'=>1]);
            return Redirect::route('user.setting')->with('message', '<div class="alert alert-info"><i class="fa fa-info-circle"></i>You have 24 hours to change your name and image. Once you changed your name it will not undo.');
    }
}

