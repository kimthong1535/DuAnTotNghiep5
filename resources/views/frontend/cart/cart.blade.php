@extends('frontend.master')
@section('content')

<div class="contact">
  <div class="container p-0">
    <div class="row">
      <div class="col-md-12 pl-md-0">
        <div class="nav_ic">
          <ul>
            <li> <a href="#" class="icon__home"><i class="fas fa-home-lg"></i></a> </li>
            <li> <a href=""><i class="fal fa-angle-right"></i></a> </li>
            <li> <a href=""> <span>Giỏ hàng</span> </a></li>
          </ul>
        </div>
      </div>
    </div>


    <div class="row mt-3 ">
      <div class="col-md-7 p-1">
        <div class="d-flex bd-highlight">
          <div class="p-2 flex-grow-1 bd-highlight">
            <h4>Giỏ hàng của bạn</h4>
          </div>
          <div class=" oio p-2 bd-highlight"><a href=""> <span>Xóa tất cả</span> </a></div>
        </div>
      </div>
      <div class="col-md-3">

      </div>
    </div>

    <div class="row">
      <div class="col-md-8 ">
        <div class="cart">

          <div class="flex-container">
            <div>
              <form action="">
                <label for="c1"></label>
                <input type="checkbox" id="c1">
              </form>
            </div>
            <div>
              <div class="iu">
                <img src="{{ asset('/Frontend/images/so.png')}}" alt="">
              </div>
            </div>
            <div class="au">
              <span style="font-weight:600 ;">Phong Vũ</span>
              <img src="{{ asset ('Frontend/images/xanh.png') }}" alt="">
            </div>
          </div>

          <hr style="margin-top: 0px;">
          <!-- ================Bảng Giỏ Hàng===================== -->
          @php $total = 0; @endphp
          <table class="tablee table table-borderless">
            @auth

            <tbody>


              @if($cart != null)
              @foreach ($cart as $value )
              <tr>
                <td scope="row"><input type="checkbox" id="c1"> </td>
                <td><img class="one" src="{{ asset ('Backend/uploads/products/'.$value->images) }}" alt=""></td>
                <td><span class="w">{{ $value->name }} </span></td>
                <td>
                  <div class="sl">
                    <div class="sl">
                      <button class="det dec"><svg fill="none" viewBox="0 0 24 24" size="16"
                             class="css-1mzhsqx"
                             color="textPrimary" height="16"
                             width="16">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12Z"
                                fill="#82869E"></path>x`
                        </svg></button>
                      <input type="number" min="1" id="updatecart" class="hy inputNumber quantity_number"
                             autocomplete="off"
                             value="{{ $value->quantity }}">
                      <button class="det inc"><svg fill="none" viewBox="0 0 24 24" size="16"
                             class="css-1mzhsqx"
                             color="textPrimary" height="16"
                             width="16">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.75 4C12.75 3.58579 12.4142 3.25 12 3.25C11.5858 3.25 11.25 3.58579 11.25 4V11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H11.25V20C11.25 20.4142 11.5858 20.75 12 20.75C12.4142 20.75 12.75 20.4142 12.75 20V12.75H20C20.4142 12.75 20.75 12.4142 20.75 12C20.75 11.5858 20.4142 11.25 20 11.25H12.75V4Z"
                                fill="#82869E"></path>
                        </svg></button>

                    </div>

                  </div>
                  <a class="delete-cart delete_button" href="{{ url('/delete-cart/'.$value->product_id) }}">Xóa</a>

                </td>
                <td>{{ number_format($value->price * $value->quantity,0,',','.') }}₫</td>
              </tr>
              <?php                            
                      $subtotal = 0;
                      $subtotal = $value->price  * $value->quantity;
                      $total += $subtotal;
              ?>
              @endforeach
              @else
              <div>giỏ hàng không có sản phẩm nào </div>
              @endif


            </tbody>
            @endauth
            @guest
            <div>giỏ hàng không có sản phẩm nào </div>
            @endguest
          </table>

          <!-- ================ Kết Thức Bảng Giỏ Hàng===================== -->


        </div>
      </div>

      <div class=" col-md-4">
        <div class="sale">
          <div class="d-flex flex-column bd-highlight mb-3">
            <div class=" chinh p-2 bd-highlight">
              <h5>Mã giảm giá</h5>
            </div>
            <div class="p-2 bd-highlight">
              <div class="ma_sale">
                <form action="" method="post">
                  @csrf
                  <input type="text" class="coupon" name="coupon" placeholder="Nhập mã của bạn">
                  <button type="button" class="btn btn-primary check_coupon">Áp dụng ngay</button>
                </form>
              </div>
              <div class="css-1ncmufo">
                <div width="100%" color="#E4E5F0" class="css-1fm9yfq"></div>
              </div>
            </div>
          </div>

        </div>
        <div class="pay">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">
                  <h5>Thanh toán</h5>
                </th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>Tạm tính</td>
                <td class="ping">{{ number_format($total,0,',','.')  }} đ</td>

              </tr>
              <tr>
                <td>Thành tiền</td>
                @if (Session::get('coupon'))
                @foreach (Session::get('coupon') as $value )
                @endforeach
                @endif
                @if (Session::get('coupon') && $cart)
                <td class="pingg">{{ number_format ($total - $value['number'] ,0,',','.') }}đ <p>(Đã bao gồm VAT)</p>
                </td>
                @elseif($cart)
                <td class="pingg">{{ number_format ($total ,0,',','.') }}đ <p>(Đã bao gồm VAT)</p>
                </td>
                @else
                <td class="pingg">0đ <p>(Đã bao gồm VAT)</p>
                </td>
                @endif

              </tr>
              <tr>
                @if(auth()->check() && $cart)
                <td colspan="2"><a class="btn btn-primary" href="{{ url('/checkout') }}">TIẾP TỤC THANH TOÁN</a></td>

                @elseif(auth()->check() && !$cart )
                <td colspan="2"><a class="btn btn-primary" href="{{ url('/home') }}">TIẾP TỤC THANH TOÁN</a></td>
                @else
                <td colspan="2"><a class="btn btn-primary" href="{{ url('/login') }}">TIẾP TỤC THANH TOÁN</a></td>
                @endif
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection