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
            @can('product-add')
            <a href="{{ URL::to('/admin/product/create-product') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
            @endcan
          </div>
          {{-- 
            Link css/js nào đặt sau thì được ưu tiên hoạt động trước
            --}}

          <div class="row">
            <div class="col-sm-12">
              <table id="table-product" class="table table-bordered datatable">
                <thead class="thead-light">
                  <tr role="row">
                    <th><input type="checkbox" name="" id="master"></th>
                    <th>Tên </th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                        style="width:250px " colspan="1"
                        aria-label="Hành động:  activate to sort column ascending">Hành động
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($product as $key => $pro)
                  <tr id="category_2" role="row" class="odd">
                    <td tabindex="0" class="sorting_1"><input type="checkbox">
                    </td>
                    <td>{{ $pro->product_name }}</td>

                    <td> <img width="70px" src="{{ asset('Backend/uploads/products/' . $pro->product_images) }}">
                    </td>
                    <td>{{ $pro->product_quantity}}</td>
                    <td>{{ number_format($pro->product_price, 0, ',', '.') }}</td>
                    {{-- ================active========================= --}}
                    <td class="text">
                      <?php if($pro->category_status == 0){ ?>
                      <a class=" btn btn-light "
                         onclick="return confirm('bạn có muốn kích hoạt Danh mục')"
                         href="{{ URL::to('/admin/active-category/' . $pro->product_id) }}">none</a>
                      <?php }elseif($pro->product_status == 1){ ?>
                      <a class=" btn btn-success "
                         onclick="return confirm('bạn có muốn kích hoạt Danh mục')"
                         href="{{ URL::to('/admin/unactive-category/' . $pro->product_id) }}">kích
                        hoạt</a>
                      <?php } ?>
                    </td>
                    {{-- ================active========================= --}}
                    <td>



                      <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Hành Động
                        </button>
                        <div class="dropdown-menu">
                          @can('product-edit')
                          <a class="btn btn-success"
                             onclick="return confirm('bạn có muốn Sửa danh mục này')"
                             href="{{ URL::to('/admin/product/edit-product/' . $pro->product_id) }}">
                            <i class="fa fa-edit">
                            </i> Chỉnh Sửa</a>
                          @endcan
                          @can('product-delete')
                          <a class=" btn btn-danger"
                             onclick="return confirm('bạn có muốn xóa danh mục này')"
                             href="{{ URL::to('/admin/product/destroy-product/' . $pro->product_id) }}">
                            <i class="fa fa-trash">
                            </i> Xóa Sản phẩm</a>
                          @endcan
                          <a class=" btn btn-primary"
                             href="{{ URL::to('/admin/gallery/add/' . $pro->product_id) }}"><i
                               class="fas fa-images"></i> Thư Viện</a>
                          <div class="dropdown-divider"></div>
                          <a class="btn btn-warning" href="#"> <i
                               class="fas fa-arrow-alt-circle-right">
                            </i> Chi Tiết</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div>
@endsection