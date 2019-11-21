@extends('admin.auth.layouts.app')

@section('content')
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
	<h3 class="mb-5">Admin Login</h3>
	<div class="form-group mb-4">
		<label>Email Address</label>
		<div class="row input-form shadow-lg">
			<div class="col-sm-2 col-2 p-0 m-0 input-icon">
				<i class="fa fa-envelope"></i>
			</div>
			<div class="col-sm-10 col-10 p-0 m-0 ">
				<input type="email" name="email" value="{{ old('email') }}" class="form-control-lg " required="">
			</div>
		</div>
	</div>
	<div class="form-group mb-5">
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
	<div class="form-group mb-4">
		<div class="row p-0 m-0">
			<div class="col-sm-6 col-6 p-0 m-0">
				<div class="custom-control custom-checkbox mb-3">
			      <input type="checkbox" class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }} name="example1">
			      <label class="custom-control-label" for="customCheck">Remember me</label>
			    </div>
			</div>
			<div class="col-sm-6 col-6 p-0 m-0 text-right">
				<a href="{{ route('admin.password.request') }}">Forgot Password?</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" value="Login" name="submit" class="btn btn-primary">
	</div>
</form>
@endsection

