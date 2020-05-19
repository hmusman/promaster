<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dealsController extends Controller
{
    public function index(){
    	return view('user.pages.deals');
    }

    public function proDeals(){
    	return view('user.pages.deals');
    }
}
