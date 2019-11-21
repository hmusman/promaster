@extends('admin.auth.layouts.app')
@section('content')
<style>
  .right-box-inner {
        padding: 30% 20px 21% !important; 
    }
</style>
<form method="POST" action="{{ route('admin.password.email') }}">
    @csrf
	<h3 class="mb-5">Admin Reset Password</h3>
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
	<div class="form-group">
		<input type="submit" value="Send Password Reset Link" name="submit" class="btn btn-primary">
	</div>
</form>
@endsection
