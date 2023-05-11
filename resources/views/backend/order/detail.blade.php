@extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
<div class="content">
  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box">

          <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <h4 class="header-title mb-4">thông tin Khách hàng</h4>
            <div class="row">
              <div class="col-sm-12">
                <table id="datatable"
                       class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                       style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                       aria-describedby="datatable_info">
                  <thead class="thead-light .background-color">
                    <tr role="row">
                      <th><input type="checkbox"></th>
                      <th>Tên khách hàng</th>
                      <th>email</th>
                      <th>Số điện thoại</th>
                      <th>địa chỉ</th>
                      <th>hình thức thanh toán</th>
                    </tr>
                  </thead>

                  <tbody id="table_category">
                    <?php
                       $i = 1;
                    ?>

                    <tr id="category_2" role="row" class="odd">
                      <td>{{ $i++ }}</td>

                      <td>{{ $shipping->fullname }}</td>
                      <td>{{ $shipping->email }}</td>
                      <td>{{ $shipping->phone }}</td>
                      <td>{{ $shipping->address }}</td>
                      @if ($shipping->payment == 1)
                      <td>thanh toán khi nhận hàng</td>
                      @else
                      <td>thanh toán qua VNPAY</td>
                      @endif

                    </tr>

                  </tbody>

                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card-box">

          <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <h4 class="header-title mb-4">đơn hàng chi tiết</h4>
            <div class="row">
              <div class="col-sm-12">
                <table id="datatable"
                       class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                       style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                       aria-describedby="datatable_info">
                  <thead class="thead-light .background-color">
                    <tr role="row">
                      <th><input type="checkbox"></th>
                      <th>Tên Sản phẩm</th>
                      <th>sô lượng</th>
                      <th>tồn kho</th>
                      <th>giá</th>
                      <th>phí vận chuyển </th>
                      <th>giảm giá</th>
                      <th>Tổng tiền</th>
                    </tr>
                  </thead>

                  <tbody id="table_category">
                    <?php
                    $i = 1;
                    $total = 0;
                    ?>
                    @foreach ($detail as $value )
                    <?php
                      $subtotal = $value->product_price ;
                      $total    += $subtotal;
                      $feeship = $value->product_feeship;
                      $coupon  = $value->product_coupon;
                    ?>
                    <tr id="category_2" role="row" class="odd">
                      <td>{{ $i++ }}</td>
                      <td style="width:250px">{{ $value->product_name }}</td>
                      <td>

                        <input type="number" min="1" class="order_qty_{{ $value->product_id }}"
                               value='{{ $value->product_sales_quantity }}'
                               name="product_sales_quantity">
                        <input type="hidden" name="order_product_id" class="order_product_id"
                               value="{{ $value->product_id}}">
                        <input type="hidden" name="order_qty_storage_"
                               value="{{$value->product->product_quantity  }}"
                               class="order_qty_storage_{{ $value->product_id }}"
                               value="{{ $value->product_id}}">

                      </td>
                      <td class="color_qty_{{ $value->product_id }}">{{ $value->product->product_quantity }}</td>
                      <td>{{ number_format($subtotal,0,',','.')  }}</td>
                      <td>{{ number_format($feeship,0,',','.')  }}</td>
                      <td>{{ number_format($coupon,0,',','.')  }}</td>
                      <td>{{ number_format($total +$feeship + $coupon ,0,',','.')  }}</td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div> <!-- end row -->
    <div class="col-md-4">
      <div class="mb-3">
        <tr>
          <td>
            @foreach ($order as $value )
            @if($value->order_status == 1)
            <form>
              @csrf
              <select class="form-control order_detail" name="order_detail">
                <option id="{{ $value->order_id }}" selected value="1">Đang xử lý</option>
                <option id="{{ $value->order_id }}" value="2">Đã xử lý - đang giao hàng</option>
                <option id="{{ $value->order_id }}" value="3">Đã nhận hàng</option>
                <option id="{{ $value->order_id }}" value="4">Hủy Đơn hàng</option>
              </select>
            </form>
            @elseif($value->order_status == 2)
            <form>
              @csrf
              <select class="form-control order_detail" name="order_detail">
                <option id="{{ $value->order_id }}" value="1">Đang xử lý</option>
                <option id="{{ $value->order_id }}" selected value="2">Đã xử lý - đang giao hàng</option>
                <option id="{{ $value->order_id }}" value="3">Đã nhận hàng</option>
                <option id="{{ $value->order_id }}" value="4">Hủy Đơn hàng</option>
              </select>
            </form>
            @elseif($value->order_status == 3)
            <form>
              @csrf
              <select class="form-control order_detail" name="order_detail">
                <option id="{{ $value->order_id }}" value="1">Đang xử lý</option>
                <option id="{{ $value->order_id }}" value="2">Đã xử lý - đang giao hàng</option>
                <option id="{{ $value->order_id }}" selected value="3">Đã nhận hàng</option>
                <option id="{{ $value->order_id }}" value="4">Hủy Đơn hàng</option>
              </select>
            </form>
            @else
            <form>
              @csrf
              <select class="form-control order_detail" name="order_detail">
                <option id="{{ $value->order_id }}" value="1">Đang xử lý</option>
                <option id="{{ $value->order_id }}" value="2">Đã xử lý - đang giao hàng</option>
                <option id="{{ $value->order_id }}" value="3">Đã nhận hàng</option>
                <option id="{{ $value->order_id }}" selected value="4">Hủy Đơn hàng</option>
              </select>
            </form>
            @endif
            @endforeach
          </td>
        </tr>
      </div>
    </div>

  </div> <!-- end container-fluid -->
</div>
@endsection