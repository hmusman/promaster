<?php 

use App\Models\course;
use App\Models\deals;

function getCourse($id){
	$course = course::where('id' , $id)->first();
	$courseName = $course->course_title;
	print_r($courseName);
}

?>