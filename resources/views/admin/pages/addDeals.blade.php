@extends('admin.includes.layout')
@if(!@$edit)
    @section('pageheader-title', 'Add Deal')
@else
    @section('pageheader-title', 'Update Deal')
@endif
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin')}}" class="breadcrumb-item">Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page">@if(!@$edit)Add Deal @else Update Deal @endif</li>
@endsection
@section('button')
@if(!@$edit)
 <button class="btn btn-space btn-success add-btn" id="add-deal">Add Deal</button>
@else
  <button class="btn btn-space btn-success add-btn" id="update-deal">Update Deal </button>
@endif
@endsection
@section('content')

<style type="text/css">
    .gradiant{background: linear-gradient(-150deg, #12b4c8, #6669e6) !important;}
</style>

<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="error-message">{!! session('message') !!}</div>
            <div class="success_message">{!! session('message') !!}</div>
            <div class="card">
                <div class="card-body p-0">
                    <form id="form" method="post" action="@if(!@$edit) {{url('admin/storeDeal')}} @else {{url('admin/updateDeal')}}/{{@$deal->id}} @endif" enctype="multipart/form-data">
                        <input type="hidden" name="course_id" id="course_id" value="{{@$deal->id}}">
                        @csrf
                        @if(@$edit)
                            {{ method_field('PATCH') }}
                        @endif
                        <div class="row m-0 p-0">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 pb-5">
                                <div class="simple-card">
                                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Deal Details</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent5">
                                        <div class="tab-pane fade show active" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                            <div class="form-group row">
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>Deal Title</label>
                                                    <input id="title" type="text" value="{{@$deal->deal_name}}" name="course_title" class="form-control required">
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3">
                                                    <label>Bundle Total Price</label>
                                                    <input id="price1" type="number" value="{{@$deal->bundle_price}}" name="price" class="form-control required">
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3">
                                                    <label>Disscount Price</label>
                                                    <input id="price2" type="number" value="{{@$deal->deal_price}}" name="price" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>About 1</label>
                                                    <input id="about1" type="text" value="{{@$deal->about1}}" name="about1" class="form-control required">
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>About 2</label>
                                                    <input id="about2" type="text" value="{{@$deal->about2}}" name="about2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>About 3</label>
                                                    <input id="about3" type="text" value="{{@$deal->about3}}" name="about3" class="form-control ">
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>About 4</label>
                                                    <input id="about4" type="text" value="{{@$deal->about4}}" name="about4" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>Deal type</label><br>
                                                    <select id='dropdownid' style="width: 60%; height: 30px;">
                                                        <option  value=''>- Please choose -</option>
                                                        <option class="Course" value='Course'>Course</option>
                                                        <option class="ProEbook" value='ProEbook'>Professional Ebook</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class=" demo col-12 col-sm-12 col-lg-12">
                                                    <label>Select Courses</label>
                                                    <select class="required" id="mselect" name="Courses" multiple required style="width: 100%; height: 34px">
                                                    	@foreach($courses as $course)
                                                    	<option value="{{@$course->id}}">{{$course->course_title}}</option>
                                                    	@endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var type;
    $('#dropdownid').on('change', function(){
        // alert(this.value);
        var val = this.value;
        type = val;
        $('#dropdownid option').removeClass('selected');
        $('.'+val).addClass('selected');
    })
	var ar ;
	$(document).ready(function(){
	$("#mselect").chosen({

     disable_search_threshold: 10

	}).change(function(event){

	     if(event.target == this){
	        alert($(this).val());
	        var chosen = $(this).val();
	        ar = 0;
	        ar = chosen;
	       console.log(ar.toString());
	    }

	});
	$("#add-deal").on('click', function(){
		var title = document.getElementById("title").value;
		var price1 = document.getElementById("price1").value;
		var price2 = document.getElementById("price2").value;
		var about1 = document.getElementById("about1").value;
		var about2 = document.getElementById("about2").value;
		var about3 = document.getElementById("about3").value;
		var about4 = document.getElementById("about4").value;
        var typee = type;
		var courses_id = ar ;
		var flag = false;
            $('.required').each(function(){
                var temp = $.trim($(this).val());
                if(!temp){
                    $(".error-message").html('<div class="alert alert-danger">Please fill all required fields!</div>');
                    flag = true;
                    return;
                }
            })
            if(!flag){
                $.ajax({
                url: '<?php echo url('admin/storeDeal')?>',
                type:'POST',
                data: {"_token": "{{ csrf_token() }}",'title' : title, 'price1' : price1, 'price2' : price2, 'about1' : about1, 'about2' : about2, 'about3' : about3, 'about4' : about4, 'courses_id' : courses_id, "typee" : type},
                // dataType: "json",
                success:function(data){
                   if($.trim(data)){
                   	$(".success_message").html('<div class="alert alert-success">Deal save successfully</div>');

                   	window.location.reload();
                   }
                   else{
                   	$(".error-message").html('<div class="alert alert-danger">Something went wrong</div>');
                   }
                }
            })
            }
	})

    $("#update-deal").on('click', function(){
        var id = document.getElementById("course_id").value;
        var title = document.getElementById("title").value;
        var price1 = document.getElementById("price1").value;
        var price2 = document.getElementById("price2").value;
        var about1 = document.getElementById("about1").value;
        var about2 = document.getElementById("about2").value;
        var about3 = document.getElementById("about3").value;
        var about4 = document.getElementById("about4").value;
        var courses_id = ar ;
        var flag = false;
            $('.required').each(function(){
                var temp = $.trim($(this).val());
                if(!temp){
                    $(".error-message").html('<div class="alert alert-danger">Please fill all required fields!</div>');
                    flag = true;
                    return;
                }
            })
            if(!flag){
                $.ajax({
                url: '<?php echo url('admin/dealUpdate/')?>/'+id,
                type:'POST',
                data: {"_token": "{{ csrf_token() }}",'id': id,'title' : title, 'price1' : price1, 'price2' : price2, 'about1' : about1, 'about2' : about2, 'about3' : about3, 'about4' : about4, 'courses_id' : courses_id},
                // dataType: "json",
                success:function(data){
                   if($.trim(data)){
                    $(".success_message").html('<div class="alert alert-success">Deal save successfully</div>');

                    window.location.reload();
                   }
                   else{
                    $(".error-message").html('<div class="alert alert-danger">Something went wrong</div>');
                   }
                }
            })
            }
    })
});
</script>
@endsection