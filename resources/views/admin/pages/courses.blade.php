@extends('admin.includes.layout')
@section('pageheader-title', 'Courses')
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin')}}" class="breadcrumb-item">Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page">Courses</li>
@endsection

@section('content')
	<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">{!! session('message') !!}</div>
		@if(count($courses) > 0)
			@foreach($courses as $key=>$course)
		        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		            <div class="card">
		                <div class="card-body">
		                    <div class="media">
		                        <img class="mr-3 user-avatar-lg rounded" src="{{url('public/course-thumbnails')}}/{{$course->course_thumbnail}}">
		                        <div class="media-body">
		                            <h3>{{$course->course_title}}</h3>
		                            <p>{{$course->course_description}}</p>
		                        </div>
		                    </div>
		                    <div class="action-btns text-right">
	                        	<form action="{{route('courses.destroy',$course->id)}}" method="POST" id="form-{{$key}}">@csrf
	                        		<a href="{{route('courses.edit',$course->id)}}" class="btn btn-primary mr-1"><i class="fa fa-edit mr-2"></i>Edit</a>
								    <input type="hidden" name="_method" value="DELETE" />
								    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger course-delete-btn"><i class="fa fa-trash mr-2"></i>Delete</button>
								</form>
	                        </div>
		                </div>
		            </div>
		        </div>
		    @endforeach
		@else
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="alert alert-warning"><i class="fa fa-exclamation-triangle  mr-2"></i>No Course Found!</div>
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
    $(document).delegate(".course-delete-btn","click",function(){
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
</script>
@endsection