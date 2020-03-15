@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>สมัครสมาชิก</h2>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="hidden" name="role" value="user" />

                        <div class="form-group row">
                            <label for="name" class="mb-0 col-md-3">ชื่อ: <span class="text-danger">*</span></label>
                            <input type="name" class="form-control col-md-8 @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" placeholder="ชื่อ">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="email" class="mb-0 col-md-3">อีเมล: <span class="text-danger">*</span></label>
                            <input type="name" class="form-control col-md-8 @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email') }}" placeholder="อีเมล">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="password" class="mb-0 col-md-3">รหัสผ่าน: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control col-md-8 @error('password') is-invalid @enderror" id="password" name="password"  value="{{ old('password') }}" placeholder="รหัสผ่าน">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="mb-0 col-md-3">ยืนยันรหัสผ่าน: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control col-md-8 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"  placeholder="ยืนยันรหัสผ่าน">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center w-100 mt-4 mb-3">
                            {{-- <button type="submit" class="btn btn-danger " style="width: 200px;">บันทึก</button> --}}
                            <button type="submit" class="btn btn-outline-danger">สมัครสมาชิก</button>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
@endsection
