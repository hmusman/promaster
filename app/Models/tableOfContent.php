<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\userProgress;

class tableOfContent extends Model
{
    protected $table = "table_of_content";
    public $timestamps = false;

    public function status($contentID,$key){
    	if($key == 0)userProgress::firstOrCreate(["user_id"=>Auth::id(),"content_id"=>$contentID,"status"=>1]);
    	return userProgress::where(["user_id"=>Auth::id(),"content_id"=>$contentID])->first(["status"]);
    }
}
