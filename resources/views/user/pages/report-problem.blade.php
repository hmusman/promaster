@extends('user.includes.layout')
@section('content-heading')
<h4 class="mb-0">Report an issue</h4>
@stop
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('user/courses')}}" class="default-color">Home</a></li>
<li class="breadcrumb-item">Report an issue</li>
@endsection
@section('content')
<style>
.formgroup input:focus,
.formgroup textarea:focus,
.btn-send-w:focus {
    border: none !important;
    box-shadow: none;
    outline: none;
}




.formgroup input {
    border-top-left-radius: 30px;
    padding: 20px;
    font-size: 13px;
    font-weight: 300;
    border: 0px;
    color: #000;
    background: #fff;
    width: 100%;
}

.formgroup textarea {
    border-top-left-radius: 30px;
    padding: 20px;
    font-size: 13px;
    font-weight: 300;
    border: 0px;
    width: 100%;
    color: #000;
    background: #fff;
}

.formgroup {
    margin-bottom: 30px;
    /*margin-top: 30px;*/
}

.center-form {
    width: 50%;
    /*margin: 0 auto;*/
}

.btn-send-w {
    border-top-left-radius: 30px;
    text-align: center;
    width: 100%;
    display: block;
    color: #fff;
    border: none;
    padding: 15px;
    background: #00eda4;
    background: -moz-linear-gradient(left, #00eda4 0%, #1d93ff 100%);
    background: -webkit-linear-gradient(left, #00eda4 0%, #1d93ff 100%);
    background: linear-gradient(-150deg, #12b4c8, #6669e6);
    cursor: pointer;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00eda4', endColorstr='#1d93ff', GradientType=1);
}
</style>
@if(session('message'))
<div class="row">
    <div class="col-xl-9">
        {!! session('message') !!}
    </div>
</div>
@endif
<section class="contact-vs drag-this-up" id="contact">
    
        <div class="col-md-12 pushtop-60" style="padding-left: 0px;">
            <div class="center-form">
                <form id="report-form" action="{{url('user/report-problem')}}" method="post">
                    <div class="formgroup">
                        <input type="text" class="required" name="subject" placeholder="Subject" required="">
                    </div>
                    @csrf
                    <div class="formgroup">
                        <textarea class="messase required" rows="5" name="problem" required=""
                            placeholder="Message"></textarea>
                    </div>
                    <div class="formgroup">
                        <button type="submit" class="btn-send-w">Send Report</button>
                    </div>
                </form>
            </div>
        </div>
    
</section>
<section>
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{url('user/report-problem')}}"><button type="button"
                        class="btn btn-success report_btn @if(\Request::is('user/report-problem')) active_btn @endif">All</button></a>
                <a href="{{url('user/report/pending')}}"><button type="button"
                        class="btn btn-success report_btn @if(\Request::is('user/report/pending')) active_btn @endif">Pending</button></a>
                <a href="{{url('user/report/solved')}}"><button type="button"
                        class="btn btn-success report_btn @if(\Request::is('user/report/solved')) active_btn @endif">Solved</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="myTable">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0 text-center" style="width:5%;">Sno#</th>
                                    <th class="border-0">user</th>
                                    <th class="border-0">Problem</th>
                                    <th class="border-0" style="width:5%;">Status</th>
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
                                            style="background-color:#FF9800">{{ucfirst($report->status)}}<label>@else
                                                <label
                                                    class="label label-primary status">{{ucfirst($report->status)}}<label>
                                                        @endif
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
</section>
<!--<div class="row">-->
<!--   <div class="col-xl-9 mb-30">-->
<!--      <div class="card h-100">-->
<!--         <div class="d-block d-md-flexx justify-content-between">-->
<!--            <div class="d-block">-->
<!--               <h2 class="card-title-e">Our team will contact you soon</h2>-->
<!--            </div>-->
<!--         </div>-->
<!--         <div class="card-body">-->
<!--            <form id="report-form" action="{{url('user/report-problem')}}" method="post">-->
<!--                @csrf-->
<!--                <div class="clearfix"></div>-->
<!--                <div class="fom-control">-->
<!--                  <label>Subject</label>-->
<!--                  <input type="text" class="required" name="subject" required="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label class="sdf" for="comment">Message</label>-->
<!--                  <textarea class="messase required" rows="5" name="problem" required=""></textarea>-->
<!--                </div>-->
<!--                <button type="submit" class="gradiant choose mt-20">Send Report</button>-->
<!--            </form>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->



@endsection


@section('extra-css')
<style>
.table-responsive {
    overflow-x: hidden;
    overflow-y: hidden;
}

.status {
    background-color: blue;
}

.report_btn {
    border-radius: 0 !important;
}

.active_btn {
    opacity: 0.9;
    color: #fff;
    background-color: #204295 !important;
    border-color: #204094 !important;
}
.btn-success{
   background-color: #4d80dd ;
    border-color: #5974e1 ;
}
.btn-success:hover{
 background-color: #204295 !important;  
 border-color: #204094 !important; 
}
</style>

@endsection
@section('script')
<script type="text/javascript">
//
$("#report-form").validate({});
// 
$(".side-menu-fixed .side-menu li a").removeClass("active");
$(".report").addClass('active');
</script>

@endsection