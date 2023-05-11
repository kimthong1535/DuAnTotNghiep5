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


        <!-- Quản lí đơn hàng -->
        <div class="lol1">
          <h5 style="font-weight: 600; margin-top: 6px;">Quản lý đơn hàng</h5>
          <div class="has">
            <ul class="nav nav-tabs ">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#home">Đã hoàn thành</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Chờ giao hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Chờ xác nhận</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane active show"><br>
                <table class="table thead-light">
                  <thead class="thead-light">
                    <tr>
                      <th>Mã đơn hàng</th>
                      <th>Ngày mua</th>
                      <th>Sản phẩm</th>
                      <th>Tổng tiền </th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $total = 0;
                    ?>
                    @foreach ($order as $value )
                    <?php
                       $subtotal = $value->product_price  * $value->product_sales_quantity;
                       $total += $subtotal;
                    ?>
                    <tr>
                      <td> <a
                           href="{{ url ('/account/order-detail/'.$value->order_code) }}">#{{ $value->order_code }}</a>
                      </td>
                      <td>{{ $dt->format('Y/m/d h:i:s') }}</td>
                      <td>{{ $value->product_name }}</td>

                      <td>{{ number_format($total) }}(đ)</td>
                      <td style="color: rgb(180, 21, 0);">
                      @if ($value->order_status == 1)
                      <a>Đang xử lý</a>
                      @elseif($value->order_status == 2)
                      <a>Đã xử lý</a>
                      @elseif($value->order_status == 3)
                      <a>Đã nhận hàng</a>
                      @else
                      <a>Đơn hàng đã hủy</a>
                      @endif


                    </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <div id="menu1" class="container tab-pane fade"><br>
                <table class="table thead-light">
                  <thead class="thead-light">
                    <tr>
                      <th>Mã đơn hàng</th>
                      <th>Ngày mua</th>
                      <th>Sản phẩm</th>
                       <th>Tổng tiền </th>
                      <th style=" padding-right: 0px;">Trạng thái</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $value )
                    <tr>
                      <td> <a href="{{ url ('/account/order-detail/'.$value->order_code) }}">
                          #{{ $value->order_code }}</a> </td>
                      <td>{{ $dt->format('Y/m/d h:i:s') }}</td>
                      <td>{{ $value->product_name }}</td>
                      <td>{{ number_format($total) }}(đ)</td>
                      <td style="color: rgb(243, 146, 0);">
                       @if ($value->order_status == 1)
                      <a>Đang xử lý</a>
                      @elseif($value->order_status == 2)
                      <a>Đã xử lý</a>
                      @elseif($value->order_status == 3)
                      <a>Đã nhận hàng</a>
                      @else
                      <a>Đơn hàng đã hủy</a>
                      @endif
                    </td>
                      <td>
                       @if ($value->order_status!=4)

                        <form>
                          @csrf
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydon">Hủy Đơn Hàng</button>

                        <div id="huydon" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Lí Do Hủy Đơn</h4>
                              </div>
                              <div class="modal-body" >
                                <p><textarea rows="5"class="lydohuydon" responsive placeholder="Lí do hủy đơn....(bắt buộc)" style="width: 460;"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                <button type="button" id="{{ $value->order_code }}" onclick="Huydonhang(this.id)" class="btn btn-success" >Send</button>
                              </div>
                            </div>

                          </div>
                        </div>
                        </form>
                         @endif
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div id="menu2" class="container tab-pane fade"><br>
                <table class="table thead-light">
                  <thead class="thead-light">
                    <tr>
                      <th>Mã đơn hàng</th>
                      <th>Ngày mua</th>
                      <th>Sản phẩm</th>
                      <th>Tổng tiền </th>
                      <th>Trạng thái</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $value )
                    <tr>
                      <td> <a href="{{ url ('/account/order-detail/' .$value->order_code) }}">
                          #{{ $value->order_code }}</a> </td>
                      <td>{{ $dt->format('Y/m/d h:i:s') }}</td>
                      <td>{{ $value->product_name }}</td>
                      <td>{{ number_format($total) }}(đ)</td>
                      <td style="color: rgb(243, 146, 0);">
                       @if ($value->order_status == 1)
                      <a>Đang xử lý</a>
                      @elseif($value->order_status == 2)
                      <a>Đã xử lý</a>
                      @elseif($value->order_status == 3)
                      <a>Đã nhận hàng</a>
                      @else
                      <a>Đơn hàng đã hủy</a>
                      @endif
                    </td>
                      <!-- <td>
                        <button class="btn btn-danger" >
                       Hủy Đơn Hàng
                      </button>
                      </td> -->
                      <td>
                       @if ($value->order_status!=4)

                        <form action="">
                          @csrf
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydonhang">Hủy Đơn Hàng</button>

                        <!-- Modal -->
                        <div id="huydonhang" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Lí Do Huy Đơn</h4>
                              </div>
                              <div class="modal-body" >
                                <p><textarea rows="5"class="lydohuydon" responsive placeholder="Lí do hủy đơn....(bắt buộc)" style="width: 460;"></textarea></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" id="{{ $value->order_code }}" onclick="Huydonhang(this.id)" class="btn btn-success" >Send</button>
                              </div>
                            </div>

                          </div>
                        </div>
                        </form>
                         @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- kết thúc quản lí đơn hàng -->



      </div>
    </div>
  </div>
</div>

@endsection