<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use DB;
use App\Models\User;
use App\Models\ebook;
use App\Models\deals;
class ebookController extends Controller
{
    public function ebooks(){
    	$ebooks = ebook::all()->take(10);
    	$totalEbooks = ebook::count();
 
    	return view('home.pages.ebooks',compact('ebooks','totalEbooks'));
    }
    public function trendingEbooks(){
    	$ebooks = ebook::all();
    	$totalebooks = ebook::count();

    	return view('home.pages.trending-ebooks', compact('ebooks'));
    }
    
    public function ebooksBundles(){

        $featureDeal = deals::where('is_featured', 1)->where('deal_type','ProEbook')->first();
        $deals = deals::where('is_featured', 0)->where('deal_type','ProEbook')->take(4)->get();

        return view('home.pages.ebooksBundles',  compact('featureDeal','deals'));
    }
}
