@extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
<div class="content">
  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box">
          <div class="mb-3">

            <a href="{{ URL::to('/admin/coupon/create-coupon') }}" class="btn btn-primary">Thêm Mã giảm giá</a>

          </div>
          <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

            <div class="row">
              <div class="col-sm-12">
                <table id="datatable" class="table table-bordered ">
                  <thead class="thead-light">
                    <tr role="row">
                      <th><input type="checkbox" name="" id="master"></th>
                      <th>Tên Mã giảm giá </th>
                      <th>Mã giảm giá</th>
                      <th>số lượng </th>
                      <th>Số Tiền giảm</th>
                      <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                          style="width:250px " colspan="1"
                          aria-label="Hành động:  activate to sort column ascending">Hành động
                      </th>
                    </tr>
                  </thead>

                  <tbody id="table_category">
                    @foreach ($coupon as $value )
                    <tr id="category_2" role="row" class="odd">
                      <td tabindex="0" class="sorting_1"><input type="checkbox">
                      </td>
                      <td>{{ $value->name }}</td>

                      <td> {{ $value->coupon_code }}</td>

                      <td>{{ $value->quantity}}</td>
                      {{-- ================active========================= --}}
                      <td class="text"> {{ number_format($value->number,0,',','.') }}</td>
                      {{-- ================active========================= --}}
                      <td>
                        <a class="btn btn-success" onclick="return confirm('bạn có muốn Sửa danh mục này')"
                           href="{{ url('/admin/coupon/edit-coupon/'.$value->id) }}">
                          <i class="fa fa-edit">
                          </i> Sửa</a>
                        <a class=" btn btn-danger" onclick="return confirm('bạn có muốn xóa danh mục này')"
                           href="{{ url('/admin/coupon/delete-coupon/'.$value->id) }}">
                          <i class="fa fa-trash">
                          </i> Xóa</a>
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