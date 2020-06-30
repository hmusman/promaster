<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\cart;
use App\Models\deals;
use App\Models\userdeals;
use App\Models\User;
use DB;
use Session;

class checkoutController extends Controller
{
    public function setSession(Request $request)
    {   
        $request->session()->forget('courseIds');
        $request->session()->forget('dealId');

        $request->session()->put('courseIds', $request->courseIds);
        $request->session()->put('dealId', $request->dealId);

        $courseIds = $request->session()->get('courseIds');
        $dealId = $request->session()->get('dealId');

        // dd($dealId);

    }
    public function checkDeal(Request $request)
    {
        $userdeals = userdeals::where('user_id',Auth::id())->get();
        // dd($userdeals);
        $DCIDS = array();
        // dd($request->courseIds);
        if($userdeals->count() > 0){
            foreach($userdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                // dd($Cids);
                // $DIDS = array_merge($DIDS, $Cids);
                $pdealss = DB::table('userdeals')
                            ->join('deals', 'userdeals.deal_id', '=', 'deals.id')
                            ->select('userdeals.course_ids as courseIDS', 'deals.deal_type as deal_type', 'deals.number_of_course as num_courses')->where('userdeals.deal_id', $Cids)->where('userdeals.user_id', Auth::id())->where('deals.deal_type', 'Course')->get();

                // deals::select('deals.deal_type', 'deals.number_of_course', 'userdeals.course_ids')->join('deals', 'deals.id', '=', 'userdeals.deal_id')->where('deals.deal_type','Course')->where('userdeals.id', $Cids)->first();

                    // dd($pdealss);

                foreach ($pdealss as $deals) {
                    $dcids = json_decode($deals->courseIDS);
                    // dd($dcids);
                    $DCIDS = array_merge($DCIDS,$dcids);
                }
            }
            // $dcourses = course::whereIn('id', $DCIDS)->get();
        }
        // dd($DCIDS);
        $matching = array_unique(array_intersect($DCIDS, $request->courseIds));
        // dd($matched);
        // $userCourses
        // $courseIds = $request->courseIds;
        // dd($userdeals, $request->dealId, $courseIds);
        $matched = array();
        $matched = array_merge($matched,$matching);
        if(!empty($matched)){
            // dd($matched);

            return $matched;
        }else{
            return 'true';
        }
    }
    public function index(Request $request){
        // dd($request->dealId,$request->session()->get('courseIds'));
    	$courses = cart::where("user_id",Auth::id())->whereNotNull('course_id')->get();
    	$ebooks = cart::where("user_id",Auth::id())->whereNotNull('ebook_id')->get();
        // $courseIds = $request->session()->get('courseIds');
        $dealId = $request->session()->get('dealId');
    	$edit = $request->edit_name;
    	$user = User::where('id', Auth::id())->first();
    	// $dealId = input::get('dealId');
    	// dd($dealId);
    	$deals = deals::where('id', $dealId)->first();
    	return view('home.pages.checkout', compact('courses', 'deals', 'ebooks', 'edit', 'user'));
    }

}
