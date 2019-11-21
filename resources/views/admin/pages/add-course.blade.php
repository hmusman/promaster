@extends('admin.includes.layout')
@if(!@$edit)
    @section('pageheader-title', 'Add Course')
@else
    @section('pageheader-title', 'Update Course')
@endif

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin')}}" class="breadcrumb-item">Dashboard</a></li>
    <li class="breadcrumb-item">Courses</li>
	<li class="breadcrumb-item active" aria-current="page">@if(!@$edit)Add Course @else Update Course @endif</li>
@endsection
@section('button')
 <button class="btn btn-space btn-success add-btn" id="add-course">@if(!@$edit)Add Course @else Update Course @endif</button>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="error-message">{!! session('message') !!}</div>
            <div class="card">
                <div class="card-body p-0">
                    <form id="form" method="post" action="@if(!@$edit) {{route('courses.store')}} @else {{route('courses.update',@$course->id)}} @endif" enctype="multipart/form-data">
                        @csrf
                        @if(@$edit)
                            {{ method_field('PATCH') }}
                        @endif
                        <div class="row m-0 p-0">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 pb-5">
                                <div class="simple-card">
                                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Course Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false">Table of Contents</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent5">
                                        <div class="tab-pane fade show active" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                            <div class="form-group row">
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>Course Title</label>
                                                    <input type="text" value="{{@$course->course_title}}" name="course_title" class="form-control required">
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>Course Price</label>
                                                    <input type="number" value="{{@$course->price}}" name="price" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-lg-12">
                                                    <label>Course Description</label>
                                                    <textarea name="course_description" class="form-control" cols="5" rows="5">{{@$course->course_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <div class="col-3 col-sm-3 col-lg-3 p-0 m-0 text-center">
                                                    <div class="row p-0 m-0">
                                                        <div class="col-sm-12 mb-4">
                                                            <label>Course Thumbnail</label><br>
                                                            <button type="button" class="gradiant choose mt-2 choose-file font-size mx-auto">Choose File</button>
                                                            <input type="file" name="course_thumbnail" class="d-none thumbnail_upload_btn @if(!@$edit) required @endif" accept="image/*">
                                                        </div>
                                                        <div class="mx-auto text-center image_preview_outter @if(@$edit) d-block @endif">
                                                            <img src="@if(@$edit) {{url('public/course-thumbnails')}}/{{@$course->course_thumbnail}} @else http://via.placeholder.com/200x112 @endif" class="img-thumbnail image_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3 p-0 m-0 text-center">
                                                    <div class="row p-0 m-0">
                                                        <div class="col-sm-12 mb-4">
                                                            <label>Course Banner</label><br>
                                                            <button type="button" class="gradiant choose mt-2 choose-file font-size mx-auto">Choose File</button>
                                                            <input type="file" name="course_banner" class="d-none banner_upload_btn @if(!@$edit) required @endif" accept="image/*">
                                                        </div>
                                                        <div class="mx-auto text-center banner_preview_outter @if(@$edit) d-block @endif">
                                                            <img src="@if(@$edit) {{url('public/course-banners')}}/{{@$course->course_banner}} @else http://via.placeholder.com/250x77 @endif" class="img-thumbnail banner_image_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3 p-0 m-0 text-center">
                                                    <div class="row p-0 m-0">
                                                        <div class="col-sm-12 mb-4">
                                                            <label>Certificate Background</label><br>
                                                            <button type="button" class="gradiant choose mt-2 choose-file font-size mx-auto">Choose File</button>
                                                            <input type="file" name="certificate_background" class="d-none certificate_upload_btn @if(!@$edit) required @endif" accept="image/*">
                                                        </div>
                                                        <div class="mx-auto text-center certificate_preview_outter @if(@$edit) d-block @endif">
                                                            <img src="@if(@$edit) {{url('public/certificate-backgrounds')}}/{{@$course->certificate_background}} @else http://via.placeholder.com/250x195 @endif" class="img-thumbnail banner_image_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3 p-0 m-0 text-center">
                                                    <div class="row p-0 m-0">
                                                        <div class="col-sm-12 mb-4">
                                                            <label>Course Ebook</label><br>
                                                            <button type="button" class="gradiant choose mt-2 choose-file font-size mx-auto">Choose File</button>
                                                            <input type="file" class="d-none ebook_upload_btn @if(!@$edit) required @endif" name="course_ebook"  accept=".pdf">
                                                        </div>
                                                        <div class=" text-center pdf_file_image_box @if(@$edit) d-block @endif mx-auto">
                                                            <img src="{{url('public\assets\images/pdf.png')}}" class="img-thumbnail pdf_file_image"><br>
                                                            <small class="pdf_file_name">{{@$course->course_ebook}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    @if(!@$edit)
                                        <h4 class="heading m-0">Lesson <span class="lesson_number"></span></h4>
                                        <div class="table_of_content mb-4">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-lg-12">
                                                    <label>Lesson Title</label>
                                                    <input type="text" name="lesson_title[]"  class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <div class="col-3 col-sm-3 col-lg-3">
                                                    <label>Lesson Content</label><br>
                                                    <input type="file" name="lesson_content[]" class="lesson_image_upload_btn" accept="image/*">
                                                </div>
                                                <div class="col-8 col-sm-8 col-lg-8">
                                                    <img src="http://via.placeholder.com/200x112" class="img-thumbnail lesson_image_preview" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-lg-12 text-right">
                                                     <button type="button" id="add-lesson-btn" class="btn btn-space btn-primary btn-small">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach($course->getTableOfContent as $key => $content)

                                            <h4 class="heading m-0">Lesson <span class="lesson_number">{{++$key}}</span></h4>
                                            <div class="table_of_content mb-4">
                                                <input type="hidden" name="content_ids[]" value="{{@$content->id}}">
                                                <div class="form-group row">
                                                    <div class="col-12 col-sm-12 col-lg-12">
                                                        <label>Lesson Title</label>
                                                        <input type="text" value="{{@$content->lesson_title}}" name="lesson_title[]"  class="form-control required">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <div class="col-3 col-sm-3 col-lg-3">
                                                        <label>Lesson Content</label><br>
                                                        <input type="file" name="lesson_content[]" class="@if(!@$edit) required @endif lesson_image_upload_btn" accept="image/*">
                                                    </div>
                                                    <div class="col-8 col-sm-8 col-lg-8">
                                                        <img src="{{url('public/table-of-content')}}/{{@$content->lesson_content}}" class="img-thumbnail lesson_image_preview" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12 col-sm-12 col-lg-12 text-right">
                                                    @if((@$key-1) == 0)
                                                         <button type="button" id="add-lesson-btn" class="btn btn-space btn-primary btn-small">Add</button>
                                                    @else
                                                        <button type="button" class="remove-lesson-btn btn btn-space btn-danger btn-small">Remove</button>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        // 
        $('.choose-file').click(function(){
            $(this).next().trigger('click');
        })
        // 
        $('a.courses').removeClass('collapse');
        $('a.courses').attr('aria-expanded','true');
        $("#submenu-1").addClass('show');
        $('a.add-courses').css('color','cyan');
        // 
        $("#add-lesson-btn").click(function(){
            var length = $(".table_of_content").length;
            $("#profile-simple").append('<h4 class="heading m-0">Lesson <span class="lesson_number">'+(++length)+'</span></h4><div class="table_of_content mb-4"> <div class="form-group row"> <div class="col-12 col-sm-12 col-lg-12"> <label>Lesson Title</label> <input type="text" name="lesson_title[]" class="form-control required"> </div></div><div class="form-group row mt-3"> <div class="col-3 col-sm-3 col-lg-3"> <label>Lesson Content</label><br><input type="file" name="lesson_content[]" accept="image/*" class="required lesson_image_upload_btn"> </div><div class="col-8 col-sm-8 col-lg-8"> <img src="http://via.placeholder.com/200x120" class="img-thumbnail lesson_image_preview" > </div></div><div class="form-group row"> <div class="col-12 col-sm-12 col-lg-12 text-right"> <button type="button" class="remove-lesson-btn btn btn-space btn-danger btn-small">Remove</button> </div></div></div>');
        })
        // 
        $(document).delegate(".remove-lesson-btn","click",function(){
            $(this).parent().parent().parent().prev().remove();
            $(this).parent().parent().parent().remove();
            var counter = 1;
            $('span.lesson_number').each(function(){
                $(this).html(counter++);
            })
        })
        // 
        function readURL(input,obj) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              obj.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
        $(".thumbnail_upload_btn").change(function() {
          var obj = $(this).parent().next().children('img');
          readURL(this,obj);
          $('.image_preview_outter').show();
        })
        $(".banner_upload_btn").change(function() {
          var obj = $(this).parent().next().children('img');
          readURL(this,obj);
          $('.banner_preview_outter').show();
        })
        $(".certificate_upload_btn").change(function() {
          var obj = $(this).parent().next().children('img');
          readURL(this,obj);
          $('.certificate_preview_outter').show();
        })
        $(document).delegate('.lesson_image_upload_btn','change',function() {
            var obj = $(this).parent().next().children('img');
            readURL(this,obj);
        })
        $(".ebook_upload_btn").change(function(){
            $(".pdf_file_image_box").show();
            $(".pdf_file_name").text($('.ebook_upload_btn').val().split('\\').pop());
        })
        // 
        $("#add-course").click(function(){
            var flag = false;
            $('.required').each(function(){
                var temp = $.trim($(this).val());
                if(!temp){
                    $(".error-message").html('<div class="alert alert-danger">Please fill required fields!</div>');
                    flag = true;
                    return;
                }
            })
            if(!flag){
                $("#form").submit();
            }
            
        })
    })
</script>
@endsection