<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class paymentController extends Controller {
    public function pay(Request $request){
        // dd($request);
        $hashSecretWord = 'MDE5NmI5YWItODM5OC00NDYxLTg2MWMtOWNiMjkxYTc4OGQx'; //2Checkout Secret Word
        $hashSid = env('2CHECKOUT_SELLER_ID'); //2Checkout account number
        $hashTotal = $_REQUEST['total']; //Sale total to validate against
        $hashOrder = $_REQUEST['order_number']; //2Checkout Order Number
        $StringToHash = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));

        if ($StringToHash != $_REQUEST['key']) {

            $result = 'Fail - Hash Mismatch'; 

        } else { 
            $order = array(
                "transaction_id" => $_REQUEST['order_number'],
                "user_id" => 1,
                "quantity" => (@$_REQUEST['total_quantity']) ? @$_REQUEST['total_quantity'] : 3 ,
                "currency" => $_REQUEST['currency_code'],
                "total" => $_REQUEST['total'],
                "courses" => $_REQUEST['products'],
                "payment_method" => $_REQUEST['pay_method'],
            );
            DB::table("orders")->insert($order);

            return redirect("order-placed");
        }
        echo @$result;

        
    }

    public function orderPlaced(){
        DB::table("cart")->where("user_id",Auth::id())->delete();
        return view("home.pages.order");
    }
}