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
            top: 21%;
            left: 7%;
         }
      </style>
   </head>
   <body>
      @php $path = url('public/certificate-backgrounds').'/'.@$course->certificate_background; @endphp
       <p style="font-family:default !important;">creating certificate...Please wait Page will redirect soon.</p>
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
    <script>
        $(document).ready(function(){
            var element = $("#html-content-holder"); 
            var getCanvas; 
            html2canvas(element, {
            onrendered: function (canvas) {
                 $("#previewImage").append(canvas);
                 getCanvas = canvas;
                 if(getCanvas){
                    var imgageData = getCanvas.toDataURL("image/png");
                     var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                     var a = $("<a>")
                        .attr("href", newData)
                        .attr("download", "{{str_replace(' ','-',@$course->course_title)}}.png")
                        .appendTo("body");
                        a[0].click();
                        a.remove();
                        window.top.close();
                 }
              }
            });
        });
         
    </script>
   </body>
</html>