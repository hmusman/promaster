@extends('admin.includes.layout')
@section('pageheader-title', 'Deals')
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin')}}" class="breadcrumb-item">Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page">Deals</li>
@endsection
@section('content')
<style>
	.tt{
	  list-style: none;
	}
	.tt li:before {
  		content: '✓';
	}

	.ttt{
		list-style: none;
	}
	.make_feature:hover{
		background-color: blue;
		color: white;
	}
	#course span br {
	    content: ' '
	}

	#course span br:after {
	    content: ' '
	}
	.action-btns.text-right {
    	bottom: 5px;
    }
</style>
<?php 
//  $con = mysqli_connect('localhost','root','','laravel-badges'); 
 ?>
	<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 success_message error-message">{!! session('message') !!}</div>
		@if(count($deals) > 0)
			@foreach($deals as $deal)
		        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		            <div class="card" id="myDealCard">
		                <div class="card-body">
		                	@if($deal->is_featured == 1)
		                	<span style="float: right;background: #646be5;color: white;padding: 5px 15px 5px 15px;border-radius: 50px;">Feature Deal</span>
		                	@else
		                	
		                	<button class="make_feature" style="float: right;background: white;border: 1px solid lightgrey;border-radius: 50px;padding: 5px 5px 5px 5px;background: white;" data-dealID="{{$deal->id}}"><a href="#" title="">Make it Feature</a></button>
		                	@endif
		                	<!-- <input type="hidden" name="del_id" id="dealID" value=""> -->
		                            <h3>Deal Title: {{$deal->deal_name}}</h3>
		                            <p><strong>Orignal Price:</strong> {{$deal->bundle_price}}</p>
		                            <p><strong>Offer Price:</strong> {{$deal->deal_price}}</p>
		                            <p><strong>Deal Type:</strong> {{$deal->deal_type}}</p>
		                            <div class="row" style="padding-left: 15px;">
		                            	<p><strong>About:</strong></p>
		                            	<div class="col-sm-2">
		                            		<ul class="@if(!empty($deal->about1)) tt @else ttt @endif">
		                            			<li>{{str_replace('<br>', ' ', $deal->about1)}}</li>
		                            		</ul>
		                            	</div>
		                            	<div class="col-sm-2">
		                            		<ul class="@if(!empty($deal->about2)) tt @else ttt @endif">
		                            			<li>{{$deal->about2}}</li>
		                            		</ul>
		                            	</div>
		                            	<div class="col-sm-2">
		                            		<ul class="@if(!empty($deal->about3)) tt @else ttt @endif">
		                            			<li>{{$deal->about3}}</li>
		                            		</ul>
		                            	</div>
		                            	<div class="col-sm-2">
		                            		<ul class="@if(!empty($deal->about4)) tt @else ttt @endif">
		                            			<li>{{$deal->about4}}</li>
		                            		</ul>
		                            	</div>
		                            </div>
		                            <p><strong>Number of courses:</strong> &nbsp;{{$deal->number_of_course}}</p>
		                    <div class="action-btns text-right">
	                        	<form action="{{url('admin/dealDelete')}}/{{$deal->id}}" method="POST" id="form">
	                        		<input type="hidden" name="del_id" id="" value="{{$deal->id}}">
	                        		@csrf
	                        		<a href="{{url('admin/dealEdit')}}/{{$deal->id}}" class="btn btn-primary mr-1"><i class="fa fa-edit mr-2"></i>Edit</a>
								    <input type="hidden" name="_method" value="POST" />
								    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger deal-delete-btn"><i class="fa fa-trash mr-2"></i>Delete</button>
								</form>
	                        </div>
		                </div>
		            </div>
		        </div>
		    @endforeach
		@else
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="alert alert-warning"><i class="fa fa-exclamation-triangle  mr-2"></i>No Deals Found!</div>
			</div>
		@endif
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning">Are you Sure to Delete ? </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-delete-model" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sure-delete-btn">YES</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $('a.courses').removeClass('collapse');
    $('a.courses').attr('aria-expanded','true');
    $("#submenu-1").addClass('show');
    $('a.all-courses').css('color','cyan');
    //
    $(document).delegate(".deal-delete-btn","click",function(){
    	var getForm = $(this).parent().attr("id");
    	$(".sure-delete-btn").attr("from-id",getForm);
    })
    // 
    $(".sure-delete-btn").click(function(){
    	var getForm = $(this).attr("from-id");
    	$("#"+getForm).submit();
    })
    $(".close-delete-model").click(function(){
    	$(".sure-delete-btn").removeAttr("from-id");
    })
    $(".make_feature").click(function(){
    var id = $(this).attr('data-dealID');
    	$.ajax({
    		url: "{{url('admin/make-feature')}}",
    		type: "POST",
    		data: {"_token": "{{ csrf_token() }}", "id": id},
    		success:function(data){
               if($.trim(data)){
               	$(".success_message").html('<div class="alert alert-success">Deal Marked Feature successfully</div>');
  				window.location.reload();
               	 }
               else{
               	$(".error-message").html('<div class="alert alert-danger">Something went wrong</div>');
               }
            }
    	})
    }) 
</script>
@endsection