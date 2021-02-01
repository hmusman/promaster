@extends('admin.includes.layout')
@if(!@$edit)
    @section('pageheader-title', 'Add Ebook')
@else
    @section('pageheader-title', 'Update Ebook')
@endif

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url('admin')}}" class="breadcrumb-item">Dashboard</a></li>
    <li class="breadcrumb-item">Ebooks</li>
	<li class="breadcrumb-item active" aria-current="page">@if(!@$edit)Add Ebook @else Update Ebook @endif</li>
@endsection
@section('button')
 <button class="btn btn-space btn-success add-btn" id="add-ebook">@if(!@$edit)Add Ebook @else Update Ebook @endif</button>
@endsection

@section('content')
<style type="text/css">
    .gradiant{background: linear-gradient(-150deg, #12b4c8, #6669e6) !important;}
    .no_display{display: none !important;}
    .course{
        width: 100%;
        height: 31px;
        border: 1px solid #d2d2e4;
    }
</style>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="error-message">{!! session('message') !!}</div>
            <div class="card">
                <div class="card-body p-0">
                    <form id="form" method="post" action="@if(!@$edit) {{route('ebooks.store')}} @else {{route('ebooks.update',@$ebook->id)}} @endif" enctype="multipart/form-data">
                        @csrf
                        @if(@$edit)
                            {{ method_field('PATCH') }}
                        @endif
                        <div class="row m-0 p-0">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 pb-5">
                                <div class="simple-card">
                                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Ebook Details</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent5">
                                        <div class="tab-pane fade show active" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                            <div class="form-group row">
                                                <div class="col-6 col-sm-6 col-lg-6">
                                                    <label>Ebook Title</label>
                                                    <input type="text" value="{{@$ebook->ebook_title}}" name="ebook_title" class="form-control required">
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3">
                                                    <label>Price</label>
                                                    <input type="number" value="{{@$ebook->ebook_price}}" name="price" class="form-control required">
                                                </div>
                                                <div class="col-3 col-sm-3 col-lg-3">
                                                    <label>Related Course</label><br>
                                                    <select class="course" name="course" id="course">
                                                        <option class="rm_br" value="">Select Option</option>
                                                    @foreach($courses as $course)
                                                      <option class="rm_br" value="{{$course->id}}" <?php echo ($course->id == @$ebook->course_id) ? 'selected' : '' ?> >{{$course->course_title}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-12 col-lg-12">
                                                    <label>Ebook Description</label>
                                                    <textarea name="ebook_description" class="form-control" cols="5" rows="5">{{@$ebook->ebook_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <div class="col-3 col-sm-3 col-lg-3 p-0 m-0 text-center">
                                                    <div class="row p-0 m-0">
                                                        <div class="col-sm-12 mb-4">
                                                            <label>Ebook Thumbnail</label><br>
                                                            <button type="button" class="gradiant choose mt-2 choose-file font-size mx-auto">Choose File</button>
                                                            <input type="file" name="ebook_thumbnail" class="d-none thumbnail_upload_btn @if(!@$edit) required @endif" accept="image/*">
                                                        </div>
                                                        <div class="mx-auto text-center image_preview_outter @if(@$edit) d-block @endif">
                                                            <img src="@if(@$edit) {{url('public/ebook-thumbnails')}}/{{@$ebook->ebook_thumbnail}} @else http://via.placeholder.com/200x112 @endif" class="img-thumbnail image_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
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
        $('a.ebooks').removeClass('collapse');
        $('a.ebooks').attr('aria-expanded','true');
        $("#submenu-1").addClass('show');
        $('a.add-ebooks').css('color','cyan');
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
        // 
        $("#add-ebook").click(function(){
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