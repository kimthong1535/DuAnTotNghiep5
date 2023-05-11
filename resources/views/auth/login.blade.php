@extends('layouts.app')

@section('content')
<div class="container">
  <div class="bic border mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6  pr-0">
        <div class="cats">
          <img src="{{ asset('frontend/images/cho.jpeg') }}" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="cat">
          <h4 style="text-align: center; margin-bottom: 30px;">Welcome Back!</h4>
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="email" id="exampleInputPassword1"
                     placeholder="Enter Email Address...">
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                     placeholder="Password">
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="custom-control custom-checkbox small">
              <input name="user[remember_me]" type="hidden" value="0">
              <input class="custom-control-input" type="checkbox" value="1" name="user[remember_me]"
                     id="user_remember_me">
              <label class="custom-control-label" for="user_remember_me">Nhớ mật khẩu</label>
            </div>

            <button class="btc mt-2">Đăng nhập</button>
            <hr>
          </form>
        </div>
        <div class="row mt-2 pt-2">
          <div class="col-sm-12 text-center">
            <p class="text-muted mb-0">Chưa có tài khoản? <a href="{{ url('/register') }}"
                 class="text-dark ml-1"><b>Đăng ký</b></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection