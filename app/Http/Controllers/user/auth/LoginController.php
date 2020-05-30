<?php

namespace App\Http\Controllers\user\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Cache;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\user\traits\activityLog;
class LoginController extends Controller
{
    // use VerifiesEmails;
    use activityLog;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function registerUser(Request $request){
        $request->validate([
            'email' => 'required|unique:users',
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'gender' => 'required',
            'country' => 'required',
            'terms_and_condition' => 'required',
            'password' => 'confirmed|min:6',
            
        ]);
    	$user = array(
    		"first_name" => input::get('first_name'),
    		"last_name" => input::get('last_name'),
    		"gender" => input::get('gender'),
    		"country" => input::get('country'),
    		"email" => input::get('email'),
    		"password" => Hash::make(input::get('password')),
    	);
    	$result = DB::table('users')->insert($user);
    	if($result){
    		$credentials = $request->only('email', 'password');
	        if (Auth::attempt($credentials)) {
                // $this->resend($request);
                User::where("id",Auth::id())->update(["login_at"=>Carbon::now()]);
	            return redirect()->to('user/courses');
	        }
    	}
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt($credentials, $remember_me)) {
            $this->createActivity(Auth::id(),'login','Logged in');
            User::where("id",Auth::id())->update(["login_at"=>Carbon::now()]);
            return "true";
        }else{return "false";}
    }

    public function loginView(){
        return view("home.pages.login");
    }
    public function signupView(){
        return view("home.pages.signup");
    }
    public function logout(){
        $this->createActivity(Auth::id(),'logout','Logged out');
        Cache::forget('online'. Auth::user()->id.Auth::user()->email);
        Auth::logout();
        return redirect('/');
    }
}
