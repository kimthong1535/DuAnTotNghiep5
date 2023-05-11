@extends('layouts.app')

@section('content')
<div class="container">
  <div class="bic mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6  pr-0">
        <div class="cat">
          <h4 style="text-align: center; margin-bottom: 30px;"><img src="{{ asset ('Frontend/images/dangkyngay.png') }}"
                 alt=""></h4>
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Họ và tên">
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="text" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email">
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                     placeholder="Mật khẩu">
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1"
                     placeholder="Nhập lại mật khẩu">
            </div>
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <button class="btc mt-2">Đăng ký</button>
            <hr>
          </form>
          <div class="row mt-2 pt-2">
            <div class="col-sm-12 text-center">
              <p class="text-muted mb-0">Đăng nhập tại đây ==> <a href="{{ url('/login') }}"
                   class="text-dark ml-1"><b>Đăng Nhập</b></a></p>
            </div>
          </div>

          {{-- <div class="now">
            <img src="{{ asset ('Frontend/images/icc.png') }}" alt="">
        </div> --}}
      </div>
    </div>
    <div class="col-md-6">


      <div class="cats">
        <img src="{{ asset ('Frontend/images/cho2.jpeg') }}" alt="">

      </div>
    </div>
  </div>
</div>

</div>

@auth
nếu đã đăng nhập
@endauth
@guest
...chưa đn
@endguest
@endsection

<!-- auth()->user()->tên cột ->

  <!- 
if(auth()->check()){

}else{
bạn chưa đăng nhập
}
-->