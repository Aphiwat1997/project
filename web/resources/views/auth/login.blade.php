@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5" >
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                            @csrf
                    <div class="text-center">
                        {{-- <img src="{{ asset('images/s1.png') }}" alt="" width="100px"> --}}
                        <h2>เข้าสู่ระบบ</h2>
                    </div>
                    <form>
                        <div class="form-group row">
                            <label for="email" class="mb-0 col-md-3">อีเมล: <span class="text-danger">*</span></label>
                            {{-- <input type="name" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="ชื่อ"> --}}
                            <input id="email" type="email" class="form-control col-md-8 @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="อีเมล">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="password" class="mb-0 col-md-3">รหัสผ่าน: <span class="text-danger">*</span></label>
                            {{-- <input type="password" class="form-control" id="passwors" placeholder="รหัสผ่าน"> --}}
                            <input id="password" type="password" class="form-control col-md-8 @error('password') is-invalid @enderror " name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="รหัสผ่าน">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="text-center mt-4 mb-3">
                            <button type="submit" class="btn btn-outline-primary mr-2">{{ __('เข้าสู่ระบบ') }}</button>
                            <a href="/register" class="btn btn-outline-danger">สมัครสมาชิก</a>
                        </div>
                    </form>
                    {{-- <a  href="{{ url('/login/facebook') }}" role="button" class="btn btn-block btn-social btn-facebook text-center">
                        <span class="fa fa-facebook text-white"></span> เข้าสู่ระบบผ่าน Facebook
                    </a>
                    <a href="{{ url('/login/google') }}" class="btn btn-block btn-social btn-google text-center">
                        <span class="fa fa-google"></span> เข้าสู่ระบบผ่าน Google
                    </a> --}}
                    <div class="mt-3">
                       @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('ลืมรหัสผ่าน') }}
                                    </a>
                        @endif
                    </div>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="text-center">
                <h4>เข้าสู่ระบบ</h4>
                <h4>ด้วยเครือข่ายโซเชียลมีเดีย</h4>
            </div>
            <a  href="{{ url('/login/facebook') }}" role="button" class="btn btn-block btn-social btn-facebook text-center mt-4">
                <span class="fa fa-facebook "></span> เข้าสู่ระบบผ่าน Facebook
            </a>
            <a href="{{ url('/login/google') }}" class="btn btn-block btn-social btn-google text-center mt-4">
                <span class="fa fa-google"></span> เข้าสู่ระบบผ่าน Google
            </a>
        </div>
    </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
