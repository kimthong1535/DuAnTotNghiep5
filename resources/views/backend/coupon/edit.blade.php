@extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box">
      <h4 class="header-title mb-4">Sửa mã </h4>
      <div class="row">
        <div class="col-xl-12">
          <form action="{{ URL::to('/admin/coupon/update-coupon/'.$coupon->id) }}" method="POST"
                id="form_category_create"
                enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="title_product" for="">Tên mã giảm giá</label>
                  <input type="text" value="{{ $coupon->name }}" name="coupon_name" class="title_product form-control"
                         id="">
                </div>
                @error('product_name')
                <span class="erorr text-danger"> {{ $message }} </span>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="title_product" for="">Mã giảm giá</label>
                  <input type="text" value="{{ $coupon->code }}" name="coupon_code" class=" title_product form-control"
                         id="">
                </div>
                @error('product_price')
                <span class="erorr text-danger"> {{ $message }} </span>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="title_product" for="">Số tiền mã giảm giá</label>
                  <input type="text" value="{{ $coupon->number }}" name="coupon_number"
                         class=" title_product form-control" id="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="title_product" for="">Số lượng</label>
                  <input type="text" value="{{ $coupon->quantity }}" name="coupon_quantity"
                         class=" title_product form-control" id="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-primary">cập nhập</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div><!-- end col -->


      </div><!-- end row -->
    </div>
  </div><!-- end col -->
</div>
@endsection