<!DOCTYPE html>
<html lang="en ">
<head>
  <title>ProMaster</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{url('public/assets/style.css')}}">
</head>
<body>
	<div class="login-box shadow">
		<div class="row login-box-inner">
			<div class="col-sm-6 left-box"></div>
			<div class="col-sm-6 right-box">
				<div class="right-box-inner">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
@error('email')
<script>
    Command: toastr["error"]("{{$message}}")
</script>
@enderror
@error('password')
<script>
    Command: toastr["error"]("{{$message}}")
</script>
@enderror
@if(session('status'))
<script>
    Command: toastr["success"]("{{ session('status') }}")
</script>
@endif
</body>
</html>