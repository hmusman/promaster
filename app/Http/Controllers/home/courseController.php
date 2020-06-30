<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;
use App\Models\userdeals;
use App\Models\usercourse;
use App\Models\User;
use App\Models\course;
use App\Models\deals;

class courseController extends Controller
{
    public function index($id){
    	$courses = course::all();
    	$course = course::where("id",$id)->first();
 		$pcourse = usercourse::where('user_id', Auth::id())->get();
       $pdeals = userdeals::where('user_id', Auth::id())->whereNotNull('deal_id')->whereNotNull('course_ids')->get();
    // dd($pdeals);
      $CIDS = array();
      $DCIDS = array();

      if($pcourse->count() > 0){
            foreach($pcourse as $pc){

                $Cids = json_decode($pc->course_id);
                // dd($Cids);
                $CIDS = array_merge($CIDS, $Cids);
            }

            // $pcourses = course::whereIn('id', $CIDS)->get();
        }
      if($pdeals->count() > 0){
            foreach($pdeals as $pd){

                $Cids = json_decode($pd->deal_id);
                // dd($Cids);
                // $DIDS = array_merge($DIDS, $Cids);
                $pdealss = DB::table('userdeals')
                            ->join('deals', 'userdeals.deal_id', '=', 'deals.id')
                            ->select('userdeals.course_ids as courseIDS', 'deals.deal_type as deal_type', 'deals.number_of_course as num_courses')->where('userdeals.deal_id', $Cids)->where('deals.deal_type', 'Course')->get();

                    // dd($pdealss);
                foreach ($pdealss as $deals) {
                    $dcids = json_decode($deals->courseIDS);
                    $DCIDS = array_merge($DCIDS,$dcids);
                }
            }
            // $dcourses = course::whereIn('id', $DCIDS)->get();
        }
      $ids =  array_unique(array_merge($DCIDS, $CIDS));
      // dd($ids);
 		$deals = deals::where('deal_type', 'Course')->orderBy('deal_price', 'ASC')->get();
 		// dd($pdeals);
    	
    	return view('home.pages.single-course',compact('course','deals','courses','ids'));
    }
    
}
