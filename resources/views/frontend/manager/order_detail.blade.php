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

        <div class="row ">
          <div class="pus">
            <i class="far fa-angle-left"></i> <span> <b>ĐƠN HÀNG:#{{ $order->order_code }}</b> </span>
          </div>
        </div>

        <div class="row ">
          <div class="col-md-6 " style=" padding-left: 0px; ">
            <div class="pas">
              <ul style="padding-left: 0px; ">
                <li class="mb-2"> <strong>Thông tin người nhận</strong> </li>
                <li><strong>Người nhận:</strong> {{ auth()->user()->name }}</li>
                <li><strong>Hình thức nhận hàng:</strong> Giao hàng tiêu chuẩn</li>
                <li><strong>Địa chỉ:</strong>
                  {{ $order->address }} - {{ $order->Wards->name }} - {{ $order->Province->name }} -
                  {{ $order->City->name }}
                </li>
                <li><strong>Điện thoại:</strong>{{ $order->phone }}</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 " style=" padding-left: 0px;padding-right: 0px; ">
            <div class="pas">
              <ul style="padding-left: 0px; ">
                <li class="mb-2"> <strong>Thông tin đơn hàng</strong> </li>
                <li><strong>Trạng thái đơn hàng:</strong> Đã hủy</li>
                <li><strong>Thời gian tạo:</strong> {{ $dt->format('Y/m/d h:i:s') }}</li>

              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="bic">
            <div class="tex mb-3">
              <span>Sản phẩm</span>
            </div>
            {{-- <div class="viv">
              <p style=" margin-bottom: 10px; "> <strong>Vận đơn 1: 21121239180920-30</strong> <span>ĐÃ HỦY</span></p>
              <p><a href="#">Xem chi tiết vận đơn <i class="far fa-angle-right"></i></a></p>
            </div> --}}
            <div class="sku">
              <?php
              $total = 0;
              ?>
              @foreach ($detail as $value )
              <?php
                  $subtotal = $value->product_price  * $value->product_sales_quantity;
                  $total += $subtotal;
              ?>
              <div class="row mt-4">
                <div class="col-md-9 ">
                  <div class="so">
                    <img src="{{ asset ('Backend/uploads/products/'.$value->product_images) }}" alt="">
                  </div>
                  <div class="so">
                    <ul style=" padding-left: 15px; ">
                      <li>{{ $value->product_name }}</li>
                      <li>SKU: 211006516</li>
                      <li>Cung cấp bởi <a href="">Phong Vũ</a> </li>

                    </ul>
                  </div>
                </div>
                <div class="col-md-3 ">
                  <div class="si">
                    <ul>
                      <li> <strong>{{ number_format($value->product_price,0,'.','.')  }}đ</strong> </li>


                    </ul>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>

        <div class="row">
          <div class="nic">
            <div class="row">
              <div class="col-md-7 ">
                <!-- ----------------------Trống------------------------------- -->
              </div>
              <div class="col-md-5  text-right">
                <table>
                  <tbody>
                    <tr>
                      <td>Tổng tạm tính</td>
                      <td class="y"> <strong>{{ number_format($total,0,'.','.')  }} đ</strong> </td>
                    </tr>
                    <tr>
                      <td>Phí vận chuyển </td>
                      <td class="y"> <strong>{{ number_format($value->product_feeship,0,'.','.')  }} đ</strong> </td>
                    </tr>
                    <tr>
                      <td>Giảm giá</td>
                      @if($value->product_coupon)
                      <td class="y"> <strong>{{ number_format($value->product_coupon,0,'.','.')  }} đ</strong> </td>
                      @else
                      <td class="y"> <strong>0 đ</strong> </td>
                      @endif
                    </tr>
                    <tr>
                      <td>Thành tiền </td>
                      <td class="tt">
                        {{ number_format( $totalAll = $total + $value->product_coupon + $value->product_feeship ,0,'.','.')  }}
                        đ
                      </td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td>(Đã bao gồm VAT)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="pt">
            <p class="po">Phương thức thanh toán</p>
            <hr>
            <div class="row">
              <div class="col-md-6 v">
                @if($order->paymemt == 1)
                <p>Thanh toán khi nhận hàng</p>
                @else
                <p>Thanh toán qua Paypal</p>
                @endif
              </div>
              <div class="col-md-6 text-right  v">
                <p>
                  <strong> {{ number_format( $totalAll  ,0,'.','.')}}đ</strong>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection