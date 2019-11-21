<?php

namespace App\Http\Controllers\user\traits;
use Illuminate\Http\Request;
use Input;
use DB;
trait activityLog
{
	public function createActivity($causedBy,$type,$log){
		activity()
       ->causedBy($causedBy)
       ->withProperties(['type' => $type])
       ->log($log);
	}
}
