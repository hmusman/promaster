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
  <style>
      .right-box-inner {
            padding: 8% 20px 21% !important; 
        }
  </style>
</head>
<body>
	<div class="login-box shadow">
		<div class="row login-box-inner">
			<div class="col-sm-6 left-box"></div>
			<div class="col-sm-6 right-box">
				<div class="right-box-inner">
					<form method="POST" action="{{ route('password-update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                    	<h3 class="mb-5">Reset Password</h3>
                    	<div class="form-group mb-4">
                    		<label>Email Address</label>
                    		<div class="row input-form shadow-lg">
                    			<div class="col-sm-2 col-2 p-0 m-0 input-icon">
                    				<i class="fa fa-envelope"></i>
                    			</div>
                    			<div class="col-sm-10 col-10 p-0 m-0 ">
                    				<input type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control-lg " required="">
                    			</div>
                    		</div>
                    	</div>
                    	<div class="form-group mb-4">
                    		<label>Password</label>
                    		<div class="row input-form shadow-lg">
                    			<div class="col-sm-2 col-2 p-0 m-0 input-icon">
                    				<i class="fa fa-lock"></i>
                    			</div>
                    			<div class="col-sm-10 col-10 p-0 m-0">
                    				<input type="password" name="password" value="{{ old('password') }}" class="form-control-lg" required="">
                    			</div>
                    		</div>
                    	</div>
                    	<div class="form-group mb-5">
                    		<label>Confirm Password</label>
                    		<div class="row input-form shadow-lg">
                    			<div class="col-sm-2 col-2 p-0 m-0 input-icon">
                    				<i class="fa fa-lock"></i>
                    			</div>
                    			<div class="col-sm-10 col-10 p-0 m-0">
                    				<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control-lg" required="">
                    			</div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<input type="submit" value="Reset Password" name="submit" class="btn btn-primary">
                    	</div>
                    </form>
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