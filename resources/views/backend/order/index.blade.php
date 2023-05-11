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
            <h4 class="header-title mb-4">đơn hàng</h4>
            <div class="row">
              <div class="col-sm-12">
                <table id="datatable"
                       class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                       style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                       aria-describedby="datatable_info">
                  <thead class="thead-light .background-color">
                    <tr role="row">
                      <th><input type="checkbox"></th>
                      <th>Mã đơn hàng</th>
                      <th>Tình trạng đơn hàng</th>
                      <th style="width: 130px;">Hành động</th>
                      <th style="width: 120px;"></th>
                    </tr>
                  </thead>

                  <tbody id="table_category">
                    <?php
                       $i = 1;
                    ?>
                    @foreach ($order as $value )
                    <tr id="category_2" role="row" class="odd">
                      <td>{{ $i++ }}</td>
                      <td>{{ $value->order_code }}</td>

                      @if ($value->order_status == 1)
                      <td>Đang xử lý</td>
                      @elseif($value->order_status == 2)
                      <td>Đã xử lý</td>
                      @elseif($value->order_status == 3)
                      <td>Đã nhận hàng</td>
                      @else
                      <td>Đơn hàng đã hủy</td>
                      @endif

                      <td>
                        @if ($value->order_status!=4)
                        <a class="btn btn-success"
                           href="{{ URL::to('/admin/order/view-order/' .$value->order_code  ) }}">
                          <i class="fa fa-eye"> </i>
                          </i> Xem đơn hàng</a>
                          <!-- <a class="btn btn-danger" onclick="return confirm('bạn có muốn hủy danh mục này')">
                          <i class="fa fa-times"></i></i>Hủy Đơn Hàng</a> -->
                          
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
                                <p><textarea rows="5"class="lydohuydon" responsive placeholder="Lí do hủy đơn....(bắt buộc)" style="width: 460px;"></textarea></p>
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
            </div>

          </div>
        </div>
      </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div>
@endsection