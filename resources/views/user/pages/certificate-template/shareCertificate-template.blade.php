<html>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
      <style type="text/css">
        @php $path = url('public/assets/fonts/MYRIADPRO-REGULAR.woff'); @endphp
         @font-face {
           font-family: Myriad Pro;
           src: url({{$path}});
         }
         span{
         font-family: Myriad Pro;
         text-transform: uppercase;
         text-align: left;
         }
         p{
         font-family: Myriad Pro;
         }
         .inner-text{
            width: 65%;
            position: absolute;
            top: 20%;
            left: 7%;
            padding-top: 4%;
         }
         jq-toast-single jq-has-icon jq-icon-info{
        font-size: 18px !important;
    }
    .jq-toast-single {
        display: block;
        width: 149% !important;
        padding: 10px;
        margin: 0 0 5px;
        border-radius: 4px;
        font-size: 14px !important;
        font-family: arial,sans-serif;
        line-height: 26px !important;
        position: relative;
        pointer-events: all!important;
        background-color: #444;
        color: #fff;
        margin: 5px -25px -17px -162px !important;
    }
    .jq-toast-single h2 {
          font-family: arial,sans-serif;
          font-size: 22px !important;
          margin: 0 0 7px;
          background: 0 0;
          color: inherit;
          line-height: inherit;
          letter-spacing: normal;
      }
      </style>
   </head>
   <body>
      @php $path = url('public/certificate-backgrounds').'/'.@$course->certificate_background; @endphp
       <p style="font-family:default !important;">Sharing certificate to email...Please wait Page will redirect soon.</p>
       <div style="background-color:white;opacity:0;"> 
          <div id="html-content-holder" style="width:800px; height:600px;">
             <div style="width:800px; height:600px;background-image: url({{$path}});background-size: cover;background-position: center;background-repeat: no-repeat;">
                <div class="inner-text">
                   <span style="font-size:31px; font-weight:bold;color:#063da3;">Certificate of Achievement </span>
                   <br><br>
                   <span style="font-size:23px;color: #656262;">This certificate is proudly <br>presented to</span>
                   <br><br>
                   <span style="font-size:25px;color:#2e90fd;">{{strtoupper(Auth::user()->first_name)}} {{strtoupper(Auth::user()->last_name)}}</span>
                   <br><br>
                   <span style="font-size:23px;color: #656262;">for completing the course in </span>
                   <br>
                   <span style="font-size:21px;font-weight:bold;color:#2e90fd;"> {{str_replace('<br>', ' ', @$course->course_title)}} </span>
                   <br><br>
                   <span style="font-size:20px;color: #656262;"> Demonstrating A High Level Of <br>  Compromise And Effort In The Process </span>
                   <p style="font-size:21px;color:#2e90fd;"> {{date('d-M-Y')}} <br>   </p>
                </div>
             </div>
          </div>
          <div id="previewImage" style="margin-top:5%;">
          </div>
        </div>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script>
        $(document).ready(function(){
            var element = $("#html-content-holder"); 
            var getCanvas; 
            html2canvas(element, {
            onrendered: function (canvas) {
                 $("#previewImage").append(canvas);
                 getCanvas = canvas;
                 // console.log(canvas);
                 if(getCanvas){
                    var imgageData = getCanvas.toDataURL("image/png");
                    console.log(imgageData);
                     var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                     var courseId = <?php echo $course_id; ?>;
                     var title = "<?php echo $courseTitle; ?>";
                     var userName = "<?php echo  $userName ?>";
                     var userEmail = "<?php echo  $userEmail ?>";
                     var usersubject = "<?php echo  $usersubject ?>";
                     var recipientemail = "<?php echo  $recipientemail ?>";
                     var subject = "<?php echo  $subject ?>";
                     var body = "<?php echo  $body ?>";
                     var image = "<?php echo  $image ?>";
                        $.ajax({
                            type: "POST",
                            url: "<?php echo url('user/save-certificate') ?>",
                            data: { 
                              "_token": "{{csrf_token()}}",
                                imgBase64: imgageData
                            }
                        }).done(function(o, data, response) {
                          console.log(data);
                          if (response['responseText'] == 'Done') {
                              $.ajax({
                                    type: "POST",
                                    url: "<?php echo url('user/share-certificate-email') ?>",
                                    data: { 
                                      "_token": "{{csrf_token()}}",
                                      'courseId': courseId,
                                      'title': title,
                                      'userName': userName,
                                      'userEmail': userEmail,
                                      'usersubject': usersubject,
                                      'recipientemail': recipientemail,
                                      'subject': subject,
                                      'body': body,
                                      'image': image,
                                    },
                                    success:function(data , response){
                                      console.log($.trim(data));
                                      if($.trim(data) == 'true'){
                                          $.toast({
                                                heading: 'Success',
                                                text: 'Certificate shared to email successfully. Now You will be redirected back.',
                                                showHideTransition: 'slide',
                                                icon: 'success',
                                                position: 'top-right',
                                                hideAfter: false,
                                                showHideTransition: 'slide',

                                            })

                                          window.location.href = "https://promastersgips.com/user/certificates";
                                      }
                                    },
                                    error:function(response){
                                        $.toast({
                                            heading: 'Error',
                                            text: 'Something Went wrong, please try again later.',
                                            showHideTransition: 'fade',
                                            icon: 'error',
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            hideAfter: false,
                                            showHideTransition: 'slide',

                                        })
                                    }
                              })
                          }else{
                            alert('i am here...');
                          }

                            // Do here whatever you want.
                        });
                 }
              }
            });
        });
         
    </script>
   </body>
</html>