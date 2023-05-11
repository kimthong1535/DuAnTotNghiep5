@extends('frontend.master')
@section('content')

<div class="contact">
  <div class="container">
    <div class="row">

      <div class="col-md-8 mt-4">
        <div class="bg-white p-3 rounded pb-md-4">
          <h5><strong>Thông tin nhận hàng</strong></h5>
          <div class="row">


            <!-- ==============Thông tin nhận hàng================== -->
            {{-- <div class="col-md-6 mt-3">
              <div class="gop active">
                <div class="thu-tu">
                  <strong>Le Huu Phuoc</strong> <span> <a href=""><i class="far fa-pencil-alt"
                         style="font-size: 16px; color: gray;"></i></a></span>

                </div>
                <div class="thu-tu">
                  <span>0349735597</span>
                </div>
                <div class="thu-tu">
                  <span>01 Nguyễn Du, Phường 02, Quận 10, Thành phố Hồ Chí Minh</span>
                </div>

                <div class="tich">
                </div>
                <span class="tich1"> <i class="fal fa-check" style="color: white;"></i></span>
              </div>

            </div>
            <div class="col-md-6 mt-3">
              <div class="gop infor">
                <div class="thu-tu">
                  <strong>Le Huu Phuoc</strong> <span> <a href=""><i class="far fa-pencil-alt"
                         style="font-size: 16px; color: gray;"></i></a></span>
                </div>
                <div class="thu-tu">
                  <span>0349735597</span>
                </div>
                <div class="thu-tu">
                  <span>01 Nguyễn Du, Phường 02, Quận 10, Thành phố Hồ Chí Minh</span>
                </div>
                <div class="tich ">

                </div>
                <span class="tich1"> <i class="fal fa-check" style="color: white;"></i></span>
              </div>

            </div> --}}
            <div class="col-md-6 mt-3">
              <div class="gop1 border" data-toggle="modal" data-target="#myModal">
                <div class="text-lg-center mt-3">
                  <i class="fal fa-plus" style="font-size: 30px; color: rgb(187, 187, 187);"></i><br>
                  <span style="color:rgb(187, 187, 187) ;">Thêm địa chỉ</span>
                </div>
              </div>
            </div>
            <!-- The Modal -->
            <div class="dest modal fade justify-content-center" id="myModal" aria-hidden="true" style="display: none;">
              <div class="any modal-dialog ">
                <div class="modal-content ">



                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="d-flex justify-content-center">
                      <div class="khoi">
                        <div class="container">
                          <div class="row">
                            <h5><strong>Thông tin nhận hàng</strong></h5> <img
                                 src="{{asset ('frontend/images/xanh1.png') }}"
                                 alt=""><br><br>

                            <form>
                              @csrf
                              <div class="form-group">
                                <label for="inputAddress2"> <strong>Họ &amp; tên</strong> </label>
                                <input type="text" class="form-control fullname" name="name" id=""
                                       placeholder="Nhập tên của bạn">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4"> <strong> Số điện thoại</strong></label>
                                  <input type="text" class="form-control phone " name="phone" id="inputPassword4"
                                         placeholder="Nhập số điện thoại">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4"> <strong> Email</strong> </label>
                                  <input type="email" class="form-control email " name="email" id=""
                                         placeholder="Nhập email của bạn">
                                </div>
                              </div>
                              <hr>
                              <h5><strong>Địa chỉ nhận hàng</strong></h5><br>
                              <div class="form-row">

                                <div class="form-group col-md-6">
                                  <label for="inputState"> <strong> Tỉnh/Thành phố</strong> </label>
                                  <select id="city" class="form-control choose city">
                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                    @foreach ($city as $value )
                                    <option value="{{ $value->matp }}">{{ $value->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputState"> <strong> Quận/Huyện</strong> </label>
                                  <select id="province" class="form-control province choose">
                                    <option selected="">Chọn Quận/Huyện</option>

                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputState"> <strong> Phường/Xã</strong> </label>
                                  <select id="wards" class="form-control wards">
                                    <option>Chọn Xã/Phường</option>

                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputAddress2"> <strong> Địa chỉ cụ thể</strong></label>
                                  <input type="text" class="form-control address" name="address" id="address"
                                         placeholder="Số nhà, ngõ, tên đường...">
                                </div>
                               
                                <input type="hidden" value="{{ $value->matp}}" class="matp">
          
                                @if(Session::get('fee'))
                                <input type="hidden" value="{{ Session::get('fee') }}" class="order_fee">
                                @else
                                <input type="hidden" value="30000" class="order_fee">
                                @endif
                                @if (Session::get('coupon'))
                                @foreach (Session::get('coupon') as $value )
                                <input type="hidden" value="{{ $value['number'] }}" class="order_coupon">
                                @endforeach
                                @else
                                <input type="hidden" value="0" class="order_coupon">
                                @endif
                                <input type="hidden" value="{{ auth()->user()->id }}" class="user_id_">
                              </div>

                              {{-- <button type="button" class="gu btn btn-primary calculate_delivery">Lưu</button> --}}
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger calculate_delivery" data-dismiss="modal">ok</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ============== END Thông tin nhận hàng================== -->


          </div>
          <p><strong>Phương thức giao hàng</strong></p>
          <div class="row">
            <div class="col-md-6">
              <div class="free">
                <img src="{{ asset ('frontend/images/ys.png') }}" alt="">
                <span>Giao hàng tiêu chuẩn</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="free text-lg-right">

                <span>Miễn Phí</span>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white p-3 rounded pb-md-4 mt-4">
          <h5><strong>Ghi chú cho đơn hàng</strong></h5>
          <div class="row">
            <div class="col-md-12">

              <form action="">
                <div class="gu form-group">
                  <input type="text" class="form-control note" name="note"
                         placeholder="Nhập thông tin ghi chú cho nhà bán hàng">
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="bg-white p-3 rounded pb-md-4 mt-4 ">
          <h5><strong>Phương thức thanh toán</strong></h5>
          <span style="font-size: 15px;">Thông tin thanh toán của bạn sẽ luôn được bảo mật</span>
          <div class="row">


            <!-- ==============Thông tin nhận hàng================== -->

            <div class="col-md-6 mt-3">
              <div class="gopp" data-value="1">
                <div class="thu-tu ">
                  <strong>Thanh toán khi nhận hàng</strong>

                </div>
                <div class="thu-tu  ">
                  <span class="payment">
                    <input type="hidden" name="" value="1">
                    <option value="1">kiểm tra hàng trước khi thanh toán, lỗi trả đổi trực tiếp</option>
                  </span>
                </div>
                <div class="tich ">

                </div>
                <span class="tich1"> <i class="fal fa-check" style="color: white;"></i></span>
              </div>

            </div>
            <div class="col-md-6 mt-3">
              <div class="gopp" data-value="2">
                <div class="thu-tu">
                  <strong>Thanh toán qua VNPAY</strong> <span class="cham"> Khuyên dùng</span>
                </div>
                <div class="thu-tu ">
                  <span class="payment">
                    <input type="hidden" name="" value="2">
                    Thanh toán qua Internet Banking, Visa, Master, JCB, <br />
                  </span>
                </div>
                <div class="tich ">
                </div>
                <span class="tich1"> <i class="fal fa-check" style="color: white;"></i></span>
              </div>
            </div>
            <!-- ============== END Thông tin nhận hàng================== -->
          </div>
          <input type="hidden" name="" id="paymentValue">
        </div>
        <div class="bg-white p-3 rounded pb-md-4 mt-4 mb-5">
          <h5><strong>Mã giới thiệu</strong></h5>
          <div class="row">
            <div class="col-md-12">
              <form action="">
                <div class="gu form-group">
                  <input type="text" class="form-control"
                         placeholder="Đây là mã giới thiệu, không có tác dụng giảm giá cho đơn hàng">
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
      <div class="col-md-4 ">
        <div class="bg-white p-3 rounded pb-md-2 mt-4 mb-4">
          <div class="row mb-2">
            <div class="col-md-8 ">
              <h5 style="font-size: 19px;"><strong>Thông tin đơn hàng</strong></h5>
            </div>
            <div class="col-md-4">
              <div class="chinh text-lg-right">
                <span><a href="">Chỉnh sửa</a></span>
              </div>
            </div>
          </div>
          <!-- ===================Sản Phẩm======================= -->
          @php
          $total = 0;
          @endphp
          @foreach ($cart as $value )
          @php
          $subtotal = $value->price;
          $total += $subtotal;
          @endphp
          <div class="row mb-3">
            <div class="col-md-4 ">
              <div class="anh rounded">
                <img src="{{ asset ('Backend/uploads/products/'.$value->images) }}" alt="">
              </div>
            </div>
            <div class="col-md-8 pl-0">
              <div class="anh1">
                <span>{{ $value->name }}</span><br>
                <span style="color: gray;">Số lương: {{ $value->quantity }}</span><br>
                <span style="font-size: 15px;"> <strong>{{ number_format($value->price,0,',','.')  }}đ</strong>
                </span><br>
                @if($value->product_price - $value->price == 0 )
                @else
                <span style="color: gray;"> <del>{{ number_format($value->product_price,0,',','.')  }}đ</del> </span>
                @endif
              </div>
            </div>
          </div>
          @endforeach
          <!-- =================== kết thúc Sản Phẩm======================= -->
        </div>

        <div class="bg-white p-3 rounded pb-md-2 mt-1 mb-4">
          <div class="row">
            <div class="col-md-8">
              <div class="thuat">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                  <label class="form-check-label" for="flexCheckChecked">
                    <strong>Hỗ trợ kỹ thuật tận nơi</strong>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thuat text-lg-right">
                <span style="color: rgb(235, 33, 1);font-size: 14px;"><strong>55.000đ</strong></span>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <div class="thuat">
                <span style="font-size: 13px;">Miễn phí cho đơn hàng trên 5.000.000đ hoặc khách hàng doanh nghiệp. Mức
                  phí trên chỉ áp dụng cho ngành hàng ICT, đối với ngành hàng điện máy và điện gia dụng, vui lòng tham
                  khảo <a href="">tại đây</a></span>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white p-3 rounded pb-md-2 mt-1 mb-4">

          <!-- ================ĐẶT HÀNG=========================== -->
          <div class="row mb-1">
            <div class="col-md-6">
              <div class="dat ">
                <span>Tạm tính</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ngay text-lg-right">
                <span> <strong>{{ number_format($total,0,',','.') }} đ</strong> </span>
              </div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-md-6">
              <div class="dat">
                <span>Phí vận chuyển</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ngay text-lg-right">
                <span> <strong>{{ number_format( $feeship = Session::get('fee'),0,',','.')  }} đ</strong> </span>
              </div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-md-8">
              <div class="dat">
                <span>Hỗ trợ kỹ thuật tận nơi</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="ngay text-lg-right">
                <span> <strong>0 đ</strong> </span>
              </div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-md-6">
              <div class="dat">
                <span>Thành tiền</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ngay text-lg-right">
                <span style="color: rgb(235, 33, 1);font-size: 20px;">
                  <strong>{{ number_format($total +  $feeship ,0,',','.') }}
                    đ</strong> </span><br><span
                      style="color: gray;font-size: 13px;">(Đã bao gồm VAT)</span>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <div class="but">
                <button type="button" class="send_order">ĐẶT HÀNG NGAY</button>
              </div>
            </div>
          </div>

          <!-- ================ KẾT THỨC ĐẶT HÀNG=========================== -->
        </div>
      </div>
    </div>
  </div>
  <div id="fb-root" class=" fb_reset">
    <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
      <div></div>
    </div>
  </div>
</div>

@endsection