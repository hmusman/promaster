<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Trexology\ReviewRateable\Contracts\ReviewRateable;
use Trexology\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;
class course extends Model
{
    use ReviewRateableTrait;
    protected $table = "courses";


    public function course($id){
        return $this->where("id",$id)->first();
    }
    public function getTableOfContent(){
    	return $this->hasMany('App\Models\tableOfContent','course_id','id');
    }
    
    public function getPercentage($courseId){
        $tableOfContentIDS = tableOfContent::where(["course_id"=>$courseId])->get(["id"]);
        $progress = userProgress::where("user_id",Auth::id())->whereIn("content_id",$tableOfContentIDS)->count();
        $progressPercentage = $progress / count($tableOfContentIDS) * 100;
        return $progressPercentage / 100;
    } 
}
