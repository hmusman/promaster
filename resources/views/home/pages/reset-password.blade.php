@extends('home.includes.layout')

@section('section-1')
<style>
    .display{
        display: none;
    }
    .alert {
        font-size: 16px;
        line-height: 50px;
        position: relative;
        border-width: 0px;
        border-style: solid;
        border-radius: 0px;
        margin-bottom: 30px;
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
                    <form method="post" action="{{ route('user.password.email') }}" class="login-form mt_60" id="reset-form">
                        @csrf
                        <div class="form-group text_box">
                            <label class="f_p text_c f_400">Email</label>
                            <input type="email" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required="">
                            @error('email')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn_three form-submit-btn">Send Reset Password Link</button>
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
