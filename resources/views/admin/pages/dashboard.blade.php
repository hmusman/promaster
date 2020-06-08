@extends('admin.includes.layout')
@section('pageheader-title', 'Dashboard')
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="" class="breadcrumb-item active">Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page">Summary</li>
@if(!@$logs)
<style type="text/css">
    table.dataTable td, table.dataTable th{
        font-size: 11px !important;
    }
</style>
@endif
@endsection

@section('content')
	<div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Total Users</h5>
                        <h2 class="mb-0"> {{$totalUsers}}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                        <i class="fa fa-user fa-fw fa-sm text-info"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Total Courses</h5>
                        <h2 class="mb-0"> {{$totalCourses}}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                        <i class="fa fa-book fa-fw fa-sm text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Selled Courses</h5>
                        <h2 class="mb-0">14</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                        <i class="fa fa-shopping-cart fa-fw fa-sm text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Total Earned</h5>
                        <h2 class="mb-0"> $149.00</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

	    <!--  -->
	<div class="row">
	    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	        <div class="card">
	            <h5 class="card-header">New Enrolled Users</h5>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered first">
	                        <thead class="bg-light">
	                            <tr class="border-0">
	                                <th class="border-0 text-center">#</th>
	                                <th class="border-0">Image</th>
	                                <th class="border-0">Name</th>
                                    <!-- <th class="border-0">Gender</th> -->
	                                <th class="border-0">Email</th>
	                                <!-- <th class="border-0">Country</th> -->
	                                <th class="border-0">Registered</th>
                                    <th class="border-0">Last Login</th>
                                    <th class="border-0">Spent time</th>
	                                <th class="border-0">Status</th>
                                    <th class="border-0">Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
                    @foreach($newUsers as $key => $user)
	                            <tr>
	                                <td class="text-center">{{++$key}}</td>
	                                <td>
	                                    <div class="m-r-10 text-center"><img src="@if($user->profile_image == "default.png") {{url('public/')}}/{{$user->profile_image}} @else {{url('public/profile-images')}}/{{$user->profile_image}}  @endif" alt="user" class="rounded" width="30"></div>
	                                </td>
	                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <!-- <td>{{$user->gender}}</td> -->
	                                <td>{{$user->email}}</td>
	                                <td>{{date('d-M-Y',strtotime($user->created_at))}}</td>
                                    <td>@if(!is_null($user->login_at)){{$user->login_at->diffForHumans()}} @endif </td>
                                    <td>@if(is_null($user->spent_time)) 0 @else{{$user->spent_time}}@endif min</td>
                                    @if($user->isOnline())
	                                   <td><span class="badge-dot badge-success mr-1"></span>Online</td>
                                    @else
                                       <td><span class="badge-dot badge-danger mr-1"></span>Ofline</td> 
                                    @endif
                                    <td><a href="{{url('admin/view-user-log')}}/{{$user->id}}"><i class="fa fa-eye"></i> Logs</a></td>
	                            </tr>
                    @endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
    $('a.dashboard').addClass('active');
</script>
@endsection