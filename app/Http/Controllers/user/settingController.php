<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\course;
use App\Models\User;
use App\Models\tableOfContent;
use File;
use Response;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\user\traits\activityLog;
use Spatie\Activitylog\Models\Activity;
class settingController extends Controller
{
    use activityLog;
    public function setting(){
    	return view('user.pages.setting');
    }
    public function updateProfile(Request $request){
        // dd($request);
    	$validator  = $request->validate([
	        'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
	    ]);

	    $profile = array(
            "first_name"=>$request->first_name,
         	"last_name"=>$request->last_name,
         );
        // dd($request);
	    $path = public_path();
	    if($request->hasfile('profile_image')){
            if(File::exists($path.'/profile-images/'.Auth::user()->profile_image)) {
                File::delete($path.'/profile-images/'.Auth::user()->profile_image);
            }
            $file = input::file('profile_image');
            $ext=$file->getClientOriginalExtension();
            $profileImg = md5(rand(1111,9999)).'.'.$ext;
            $file->move(public_path().'/profile-images/' , $profileImg); 
            $profile["profile_image"] = $profileImg;
            $this->createActivity(Auth::id(),'update_profile_img','Profile image changed');    
         }
        //  echo "<pre>";
        //  print_r($profile);
        //  return;
         // dd($profile);
    	User::where("id",Auth::id())->update($profile);
        // if($request->email != Auth::user()->email){
        //     $this->createActivity(Auth::id(),'update_email','Updated email address from <strong>"'.Auth::user()->email.'"</strong> to <strong>"'.$request->email.'"</strong>.');
        // }
    	return back()->with("message","<div class='alert alert-success'>Profile Updated Successfully!</div>");
    }

    public function updateEmail(Request $request){

        // dd($request);
        $validator  = $request->validate([
            'old_email' => 'required|email',
            'email' => 'required|email|unique:users',
            'confirm_email' => 'required|email|same:email',
        ]);

        $profile = array(
            "email"=>$request->email,
         );

        // dd($profile);
        User::where("id",Auth::id())->update($profile);
        return back()->with("message","<div class='alert alert-success'>Profile Updated Successfully!</div>");
    }

    public function resetPassword(Request $request){
        // dd($request);
    	$validator  = $request->validate([
			'old_password' => 'required|min:6',
    		'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
	    ]);
        
	    if(Hash::check($request->old_password, Auth::user()->password)) { 
		   $user = User::find(Auth::id());
            $user->update([
		    'password' => Hash::make($request->password)
		    ]);
           $this->createActivity(Auth::id(),'password_changed','Changed password');
		   return back()->with("message","<div class='alert alert-success'>Password Changed Successfully!</div>");
    	}else{
    		return back()->with("message","<div class='alert alert-danger'>Invlaid Old password!</div>");
    	}
    }
}
