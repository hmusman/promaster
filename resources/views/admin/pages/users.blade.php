@extends('admin.includes.layout')
@section('pageheader-title', 'Users')
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="" class="breadcrumb-item active">Dashboard</a></li>
	
	@if(@$logs)
        <li class="breadcrumb-item"><a href="{{url('admin/users')}}" class="breadcrumb-item active">Users</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Logs</li> 
	@else
	    <li class="breadcrumb-item active" aria-current="page">Users</li> 
	@endif
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
	    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	        <div class="card">
	            <h5 class="card-header">@if(@$logs) Logs @else Users @endif</h5>
	            <div class="card-body">
	                <div class="table-responsive">
                        @if(@$logs)
                            <table class="table table table-striped table-bordered first">
                                <thead>
                                    <th style="width: 5%" class="text-center">Sno#</th>
                                    <th>Description</th>
                                    <th style="width: 20%" class="text-center">Created at</th>
                                </thead>
                            @php $counter = 1; @endphp
                            @foreach($logs as $key => $log)
                                <tr>
                                    <td class="text-center"><code>{{$counter++}}</code></td>
                                    <td>
                                        <code>{!! @$log->description !!}</code>
                                    </td>
                                    <td class="text-center">
                                        <code>{{ date('Y-m-d h:i:s',strtotime(@$log->created_at)) }}</code>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-center"><code>{{$counter}}</code></td>
                                <td>
                                    <code>User Created.</code>
                                </td>
                                <td class="text-center"><code>
                                    {{date('Y-m-d h:i:s',strtotime(@$log->getCauser->created_at))}}
                                </code></td>
                            </tr>
                            </table>
                        @else
    	                    <table class="table table-striped table-bordered first">
    	                        <thead class="bg-light">
    	                            <tr class="border-0">
    	                                <th class="border-0 text-center">#</th>
    	                                <th class="border-0">Image</th>
    	                                <th class="border-0">Name</th>
                                        <th class="border-0">Gender</th>
    	                                <th class="border-0">Email</th>
    	                                <th class="border-0">Country</th>
    	                                <th class="border-0">Registered</th>
                                        <th class="border-0">Last Login</th>
                                        <th class="border-0">Spent time</th>
    	                                <th class="border-0">Status</th>
                                        <th class="border-0">Action</th>
    	                            </tr>
    	                        </thead>
    	                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td class="text-center">{{++$key}}</td>
                                <td>
                                    <div class="m-r-10 text-center"><img src="@if($user->profile_image == "default.png") {{url('public/')}}/{{$user->profile_image}} @else {{url('public/profile-images')}}/{{$user->profile_image}}  @endif" alt="user" class="rounded" width="30"></div>
                                </td>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ \BrightNucleus\CountryCodes\Country::getNameFromCode($user->country)}}</td>
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
                        @endif
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
    $('a.users').addClass('active');
</script>
@endsection