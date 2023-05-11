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



        <!-- Số địa chỉ -->
        <div class="lol2">
          <h5 style="font-weight: 600; margin-top: 6px;">Sổ địa chỉ</h5>
          <div class="bass">
            <table>
              <tbody>
                <tr>
                  <td> <b style="font-size: 18px;">Le Huu Phuoc</b> <span class="vien" style="font-size: 13px;">Mặc
                      định</span></td>
                  <td class="chus" style="text-align: right;"> <button class="btn btn-success ">Chỉnh sửa</button> </td>
                </tr>
                <tr>
                  <td> <span>Địa chỉ: 01 ngọ, Phường 02, Quận 10, Thành phố Hồ Chí Minh</span> </td>
                </tr>
                <tr>
                  <td>
                    <span> Điện thoại: 0939838338</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="bass">
            <table>
              <tbody>
                <tr>
                  <td> <b style="font-size: 18px;">Le Huu Phuoc</b> </td>
                  <td class="chus" style="text-align: right;"> <button class="btn btn-success ">Chỉnh sửa</button>
                    <button class="btn btn-danger ">Xóa</button>
                  </td>
                </tr>
                <tr>
                  <td> <span>Địa chỉ: 01 ngọ, Phường 02, Quận 10, Thành phố Hồ Chí Minh</span> </td>
                </tr>
                <tr>
                  <td>
                    <span> Điện thoại: 0939838338</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="bass">
            <table>
              <tbody>
                <tr>
                  <td> <b style="font-size: 18px;">Le Huu Phuoc</b> </td>
                  <td class="chus " style="text-align: right;"> <button class="btn btn-success ">Chỉnh sửa</button>
                    <button class="btn btn-danger ">Xóa</button>
                  </td>
                </tr>
                <tr>
                  <td> <span>Địa chỉ: 01 ngọ, Phường 02, Quận 10, Thành phố Hồ Chí Minh</span> </td>
                </tr>
                <tr>
                  <td>
                    <span> Điện thoại: 0939838338</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>



        </div>

        <!--Kết thúc số địa chỉ -->


        <!-- Thông báo -->

        <!-- Kết thúc thông báo -->

      </div>
    </div>
  </div>
</div>

@endsection