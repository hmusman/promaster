@extends('user.includes.layout')
@section('title') Promaster | Send A Ticket @endsection
@section('content')

    <!-- content push wrapper -->
    <div class="st-pusher" id="conte">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">
          
        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner padding-none">

          <div class="container-fluid">

           <div class="media v-middle">
                <div class="media-body">
                   <div class="seo_sec_title wow fadeInUp" data-wow-delay="0.3s">
                    <h2>Submit A Ticket</h2>
                    @if(session('message'))
                    <div class="row">
                        <div class="col-xl-9">
                            {!! session('message') !!}
                        </div>
                    </div>
                    @endif
                </div>
                </div>
               
              </div>
          <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <form id="report-form" action="{{url('user/report-problem')}}" method="post">
                      @csrf
                          <div class="form-group form-control-material">
                            <input type="text" class="required form-control" name="subject" id="exampleInputFirstName" placeholder="Enter Subject" required="">
                            <label for="exampleInputFirstName">Subject</label>
                          </div>
                          <div class="form-group form-control-material">
                            <input type="textarea" class="form-control" name="problem" id="exampleInputLastName" placeholder="Enter your message" required="">
                            <label for="exampleInputLastName">Message</label>
                          </div>
              
                      <button type="submit" class="btn btn-white btn-flat paper-shadow relative">Submit</button>
                    </form>
                  </div>
                </div>

          </div>


          <div class="row">

        <div class="col-md-9 margin-25">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">

            <!-- Tabs -->
            <ul class="nav nav-tabs">
              <li class="@if(\Request::is('user/report-problem')) active @endif"><a href="{{url('user/report-problem')}}"><span class="tab-item">All</span></a></li>
              <li class="@if(\Request::is('user/report/pending')) active @endif"><a href="{{url('user/report/pending')}}"><span class="tab-item">Pending</span></a></li>
              <li class="@if(\Request::is('user/report/solved')) active @endif"><a href="{{url('user/report/solved')}}"><span class="tab-item">Solved</span></a></li>
            </ul>
            <!-- // END Tabs -->

            <!-- Panes -->
          <div class="tab-content">

              <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Sno#</th>
                  <th>User</th>
                  <th>Description</th>
                  <th>Status</th>
                  </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>Sno#</th>
                  <th>User</th>
                  <th>Description</th>
                  <th>Status</th>
    
                </tr>
              </tfoot> -->
              <tbody>
                <tr>
                @if($reports->count() > 0)
                @foreach($reports as $key => $report)
                  <td>{{++$key}}</td>
                  <td>{{@$report->getUser->first_name}} {{@$report->getUser->last_name}}</td>
                  <td>{{$report->problem}}</td>
                  <td>@if($report->status == "pending")<span class="pending">Pending</span>@elseif($report->status == "solved")<span class="solved">Solved</span>@elseif($report->status == "awaiting")<span class="awaiting">Awaiting your reply</span><span class="awaiting-mobile">Awaiting your reply</span>@endif</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>No report available</td>
                </tr>
                @endif
              </tbody>
            </table>

            </div>



            <!-- // END Panes -->

          </div>
          <!-- // END Tabbable Widget -->

          <br/>
          <br/>

        </div>
      
          </div>

        </div>  
  
        </div>
       
          </div>


        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->


@endsection


@section('script')
<script type="text/javascript">
//
// $("#report-form").validate({});
// 
$(".side-menu-fixed .side-menu li a").removeClass("active");
$(".report").addClass('active');
</script>

@endsection