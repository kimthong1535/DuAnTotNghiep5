@extends('frontend.master')
@section('content')

<div class="contact">
  <div class="container">
    <div class="row pt-3">
      <div class="col-md-3 ">
        <div class="tai-khoan">
          <div class="nho">
            <img src="./images/avt.jpg" alt=""> <span> <strong>{{ auth()->user()->name }}</strong> </span>
          </div>

          <div class="nho">
            <ul style=" padding-left: 0px; ">
              <li> <a href="{{ url ('/account') }}" class="nut1"><i class="far fa-user-circle"></i> <span>Thông tin tài
                    khoản</span></a> </li>
              <li> <a href="{{ url ('/account/orders') }}" class="nut2"><i class="fal fa-cart-plus"></i> <span>Quản lý
                    đơn hàng</span> </a> </li>
              <li> <a href="{{ url ('/account/addresses') }}" class="nut3"><i class="fal fa-map-marked-alt"></i>
                  <span>Số
                    địa chỉ</span></a> </li>
              <li> <a href="{{ url ('/account/alear') }}" class="nut4"><i class="fal fa-bell-on"></i><span>Thông
                    báo</span></a> </li>

            </ul>
          </div>

        </div>
      </div>
      <div class="ui col-md-9 ">

        <!-- Thông báo -->
        <div class="lol3">
          <div class="anh" style="text-align: center;">
            {{-- <img width="100px" src="{{ asset ('Frontend/images/khong.png') }}" alt=""><br><br> --}}
            <p>Bạn chưa có thông báo mới</p>
          </div>
        </div>
        <!-- Kết thúc thông báo -->

      </div>
    </div>
  </div>
</div>

@endsection