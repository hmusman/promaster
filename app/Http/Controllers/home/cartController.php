<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\course;
use App\Models\cart;

class cartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('cart');
    }
    public function cart(){

    	$courses = cart::where("user_id",Auth::id())->whereNotNull('course_id')->get();
        // dd($courses);
        $ebooks = cart::where("user_id",Auth::id())->whereNotNull('ebook_id')->get();
        // dd($ebooks);
        return view('home.pages.cart',compact('courses', 'ebooks'));
    }

    public function cartCount(){
    	return cart::where("user_id",Auth::id())->count();
    }
    public function addCartItem(Request $request){
    	if(cart::where(["user_id"=>Auth::id(),"course_id"=>Crypt::decrypt($request->id)])->count() == 0){
    	   cart::create(["user_id"=>Auth::id(),"course_id"=>Crypt::decrypt($request->id)]);
        }else{
            return redirect()->back()->with('message', '<div class="alert alert-info">Course already added to cart.</div>');
        }
    	return redirect()->back()->with('message', '<div class="alert alert-success">Course add to cart successfully.</div>');
    }
    public function addCartEbooks(Request $request){
        // dd(Crypt::decrypt($request->id));
        if(cart::where(["user_id"=>Auth::id(),"ebook_id"=>Crypt::decrypt($request->id)])->count() == 0)
            // dd(Crypt::decrypt($request->id));
            cart::create(["user_id"=>Auth::id(),"ebook_id"=>Crypt::decrypt($request->id)]);
        return $this->cartCount();
    }
    public function deleteCartItem(Request $request){
    	if(cart::where(["user_id"=>Auth::id(),"id"=>Crypt::decrypt($request->id)])->delete()){
    		return back()->with("alert",'<div class="alert alert-success">Cart item Deleted Successfully!</div>');
    	}else{
    		return back()->with("alert",'<div class="alert alert-danger">Something went wrong!</div>');
    	}
    }
}
