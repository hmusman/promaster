@extends('admin.includes.layout')
@section('pageheader-title', 'Problems Report')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="" class="breadcrumb-item active">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Problems Report</li>
@endsection
<style>
.action-btns a {
    display: inline-block;
    padding: 6px 6px !important;
}
</style>
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('admin/report-problem')}}"><button type="button"
                    class="btn btn-success @if(\Request::is('admin/report-problem')) active @endif">All</button></a>
            <a href="{{url('admin/report/pending')}}"><button type="button"
                    class="btn btn-success @if(\Request::is('admin/report/pending')) active @endif">Pending</button></a>
            <a href="{{url('admin/report/solved')}}"><button type="button"
                    class="btn btn-success @if(\Request::is('admin/report/solved')) active @endif">Solved</button></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        {!! session('message') !!}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0 text-center" style="width:5%;">Sno#</th>
                                <th class="border-0">user</th>
                                <th class="border-0">Problem</th>
                                <th class="border-0" style="width:5%;">Status</th>
                                <th class="border-0 text-center" style="width:10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $key => $report)
                            <tr>
                                <td class="text-center">{{++$key}}</td>
                                <td style="width:13%;">{{@$report->getUser->first_name}}
                                    {{@$report->getUser->last_name}}</td>
                                <td>{{$report->problem}}</td>
                                <td>@if($report->status == "pending")<label class="label label-warning"
                                        style="background-color:#FF9800">{{ucfirst($report->status)}}<label>@else <label
                                                class="label label-primary">{{ucfirst($report->status)}}<label> @endif
                                </td>
                                <td class="action-btns text-center">
                                    @if($report->status == "pending")<a title="Solved"
                                        href="{{route('problem.status',$report->id)}}" class="btn btn-success mr-1"><i
                                            class="fa fa-check"></i></a>@endif
                                </td>
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
$('a.report').addClass('active');
</script>
@endsection