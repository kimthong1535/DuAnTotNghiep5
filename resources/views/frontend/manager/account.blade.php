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
        <!-- Thông tin tài khoản   -->
        <div class="lol">
          <h5 style="font-weight: 600; margin-top: 6px;">Thông tin tài khoản</h5>
          <div class="bus">
            <form action="">
              <div class="form-group">
                <label for="pwd"> <strong>Họ &amp; tên</strong> </label>
                <input value="{{ auth()->user()->name }}" type="text" class="form-control" id="pwd">
              </div>
              <div class="form-group">
                <label for="email"> <strong>Email</strong> </label>
                <input value="{{ auth()->user()->email }}" type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="pwd"> <strong> Số điện thoại</strong></label>
                <input type="text" class="form-control" id="pwd">
              </div>
              <div class="form-group">
                <label for="pwd"> <strong>Ngày sinh</strong> </label>
                <input type="date" class="form-control" id="pwd">
              </div>
              <div class="form-group">
                <label for="pwd"> <strong>Giới tính</strong> </label><br>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Nam
                  </label>
                </div>
                <div class="form-check-inline">
                  <label class=" form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Nữ
                  </label>
                </div>
                <div class="form-check-inline ">
                  <label class="  form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Khác
                  </label>
                </div>
              </div>


              <button class="nude">Cập nhật</button>

            </form>
          </div>
        </div>
        <!-- Kết thúc thông tin tài khoản -->



      </div>
    </div>
  </div>
</div>
@endsection