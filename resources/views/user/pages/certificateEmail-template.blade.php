<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <!-- <h2>Promaster Contact Message</h2> -->
    <h4>{{$details['subject']}}</h4>
    <div class="row">
        <img src="{{url('public/course-thumbnails')}}/{{$details['image']}}" alt="subject_thubmail" style="height: 200px; margin-left:2%;">

      <div class="col-md-6">
        <p style="margin-top: -21%; margin-left: 39%; word-break: normal;">{{$details['body']}}</p>
        
      </div>
      
    </div>
    <pre style="margin-top: 21%;"><strong>From:</strong> {{$details['userName']}}  |  {{$details['userEmail']}}</pre>
  </body>
</html>
