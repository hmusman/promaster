<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\deals;
use Auth;
use DB;
use App\Models\userdeals;
use App\Models\usercourse;


class dealsController extends Controller
{
    public function index(){

        $courses = course::all();
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
                            ->select('userdeals.course_ids as courseIDS', 'deals.deal_type as deal_type', 'deals.number_of_course as num_courses')->where('userdeals.deal_id', $Cids)->where('userdeals.user_id', Auth::id())->where('deals.deal_type', 'Course')->get();

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
    	$featureDeal = deals::where('is_featured', 1)->where('deal_type', 'Course')->first();
      	$deals = deals::where('is_featured', 0)->where('deal_type', 'Course')->take(4)->get();

    	return view('user.pages.deals', compact('featureDeal','deals', 'courses','ids'));
    }

    public function proDeals(){

        $courses = course::all();
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
                            ->select('userdeals.course_ids as courseIDS', 'deals.deal_type as deal_type', 'deals.number_of_course as num_courses')->where('userdeals.deal_id', $Cids)->where('userdeals.user_id', Auth::id())->get();

                    // dd($pdealss);
                foreach ($pdealss as $deals) {
                    $dcids = json_decode($deals->courseIDS);
                    $DCIDS = array_merge($DCIDS,$dcids);
                }
            }
            // $dcourses = course::whereIn('id', $DCIDS)->get();
        }
      $ids = array();
      $ids =  array_unique(array_merge($DCIDS, $CIDS));
      // dd($ids);
    	$featureDeal = deals::where('is_featured', 1)->where('deal_type','ProEbook')->first();
      	$deals = deals::where('is_featured', 0)->where('deal_type','ProEbook')->take(4)->get();

    	return view('user.pages.deals', compact('featureDeal','deals', 'courses', 'ids'));
    }
}
