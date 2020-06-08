<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Responce, Session, Redirect;
use App\Models\subscribers;

class subscribeController extends Controller
{
    public function storeEmail(Request $request){
    	// dd('now im working.');
    	$email = subscribers::where('email', input::get('email'))->first();

    	if(empty($email)){
	        $email = array(
	    		"email" => input::get('email'),
	    	);

	    	$result = DB::table('subscribers')->insert($email);
    	}else{
    		Session::flash('error', "Email has been already added to subscription list.");
      		return Redirect::back();
    	}


    	if($result){
    		Session::flash('message', "Email has been added successfully to subscription list.");
      		return Redirect::back();
    	}
    	else{
    		Session::flash('error', "Something wents wrong, Please try again later.");
      		return Redirect::back();
    	}
    }
}
