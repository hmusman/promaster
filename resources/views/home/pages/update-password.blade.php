@extends('home.includes.layout')

@section('section-1')
<style>
    .display{
        display: none;
    }
</style>
<section class="login_area">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-7">
                <div class="login_info">
                    <h2 class="f_p f_700 f_size_40 t_color3 mb_20">Forget Password</h2>
                    <p class="f_p f_400 f_size_15">Welcome! Please enter your email</p>
                    <div class="error-message display" style="background-color: #e79376;padding: 16px 0px 16px 38px;">
                        <h5><i class="fas fa-warning"></i>&nbsp;invalid email or password.</h5>
                    </div>
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('user.password.request') }}" class="login-form mt_60" id="reset-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group text_box">
                            <label class="f_p text_c f_400">Email</label>
                            <input class="@error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required="">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group text_box">
                            <label class="f_p text_c f_400">Password</label>
                            <input class="@error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password"  required autocomplete="new-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group text_box">
                            <label class="f_p text_c f_400">Conform Password</label>
                            <input id="password-confirm" type="password" placeholder="Conform Password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn_three form-submit-btn">Update Password</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center">
                <div class="login_img">
                    <img src="{{url('public/assets/img/seo/login.png')}}" alt="login.png...">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
