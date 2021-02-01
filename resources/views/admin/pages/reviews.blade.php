@extends('admin.includes.layout')
@section('pageheader-title', 'Reviews')
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin')}}" class="breadcrumb-item active">Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page">Reviews</li>
@if(!@$logs)
<style type="text/css">
    table.dataTable td, table.dataTable th{
        font-size: 11px !important;
    }
    .title h6 br {
        content: ' '
    }

    .title h6 br:after {
        content: ' '
    }
</style>
@endif
@endsection

@section('content')
	<div class="row">
	    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	        <div class="card">
	            <h5 class="card-header">Reviews @if(@$reviews[0]->course['course_title']) of {{@$reviews[0]->course['course_title']}}@endif</h5>
	            @if(Request::is('admin/reviews'))
	                <div class="card-body">
	                <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0 text-center">#</th>
                                    <th class="border-0">Course Name</th>
                                    <th class="border-0">Rating</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach($courses as $key => $course)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="title"><h6><?php echo strip_tags($course->course_title, '<br>') ?></h6></td>
                                    <td class="text-center d-flex">
                                        <span class="rating-wrapper-{{$key}}">
                                        </span>
                                        <span class="rating-digit">{{number_format($course->averageRating(1),1)}}</span>
                                        <span class="rating-total">({{($course->countRating())}})</span>
                                    </td>
                                    <td class="text-center"><a href="{{url('admin/reviews')}}/{{$course->id}}" class="btn btn-space btn-primary btn-small"><i class="fa fa-eye" style="margin-right:5px;"></i>view Reviews</a></td>
                                </tr>
                                @php $rating = $course->averageRating(1); @endphp
                                @if(is_null($rating))
                                    @php $rating = 0; @endphp
                                @endif
                                @push('scripts')
                                    
                                    <script type="text/javascript">
                                          $(".rating-wrapper-{{$key}}").rateYo({
                                            rating: "{{number_format($rating,1)}}",
                                            readOnly: true,
                                            starWidth: "18px"
                                          });
                                    </script>
                                @endpush
                        @endforeach
                            </tbody>
                        </table>
	                </div>
	            </div>
	            @else
	                <div class="card-body">
    	                <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0 text-center">#</th>
                                        <th class="border-0">Image</th>
                                        <th class="border-0">Name</th>
                                        <th class="border-0">Rating</th>
                                        <th class="border-0">Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach($reviews as $key => $review)
                                    <tr>
                                        <td class="text-center">{{++$key}}</td>
                                        <td><div class="m-r-10 text-center"><img src="@if(@$review->user->profile_image == "default.png") {{url('public/')}}/{{@$review->user->profile_image}} @else {{url('public/profile-images/')}}/{{@$review->user->profile_image}} @endif" alt="user"  width="40" height="40"></div></td>
                                        <td><h6 class="m-0">{{@$review->user->first_name}} {{@$review->user->last_name}}</h6></td>
                                        <td class="text-center d-flex">
                                            <span class="rating-wrapper-{{$key}}">
                                            </span>
                                            <span class="rating-digit">{{number_format(@$review->rating,1)}}</span>
                                        </td>
                                        <td><p style="color: black;background-color: #E8E8ED;padding: 10px;">{{$review->title}}</p></td>
                                    </tr>
                                    @php $rating = @$review->rating; @endphp
                                    @if(is_null($rating))
                                        @php $rating = 0; @endphp
                                    @endif
                                    @push('scripts')
                                        
                                        <script type="text/javascript">
                                              $(".rating-wrapper-{{$key}}").rateYo({
                                                rating: "{{number_format($rating,1)}}",
                                                readOnly: true,
                                                starWidth: "18px"
                                              });
                                        </script>
                                    @endpush
                            @endforeach
                                </tbody>
                            </table>
    	                </div>
    	            </div>
	            @endif
	        </div>
	    </div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
    $('a.reviews').addClass('active');
</script>
<style type="text/css">
  svg{
    width: auto !important;
  }
  .wrap-u div.rating{
    margin-bottom: 20px;
    display: inline-block;
    position: relative;
    top: 5px;
  }
  .wrap-u p{
    height: auto !important;
    font-size: 12px;
    /*width: fit-content !important;*/
  }
  .card-body .row{
    padding-left: 10px;
  }
  .card-body .row .col-xl-1{
    padding: 0px;
  }
  .card-body .row .col-xl-1 img{
    width: 100%;
  }
  .m-0,h6{
      margin:0px !important;
  }
  .d-flex{
    padding-top: 18px !important;
  }
  td div img{
      border-radius:100% !important;
  }
  table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td{
      vertical-align:middle;
  }

 
</style>
@endsection