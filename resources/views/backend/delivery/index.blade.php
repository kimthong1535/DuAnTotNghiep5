@extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box">

      <h4 class="header-title mb-4">Thêm Phí Vận chuyển</h4>

      <div class="row ">
        <div class="col-xl-12">
          <form id="form_category_create" action="{{ URL::to ('/admin/delivery/insert-delivery') }}" method="POST"
                enctype="multipart/form-data">
            @csrf
            <div class="row  ">
              <div class="form-group col-md-6  ">
                <div class="form-group col-md-8  ">
                  <label for="inputState"> <strong> Tỉnh/Thành phố</strong> </label>
                  <select id="city" name="city" class="form-control choose city">
                    <option>Chọn Tỉnh/Thành phố</option>
                    @foreach ($city as $ci )

                    <option value="{{ $ci->matp }}">{{ $ci->name  }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label for="huyen"> <strong> Quận/Huyện</strong> </label>
                  <select id="province" name="province" class="form-control province choose">
                    <option>Chọn Quận/Huyện</option>
                  </select>
                </div>

                <div class="form-group col-md-8">
                  <label for="xa"> <strong> Xã/Phường</strong> </label>
                  <select id="wards" name="wards" class="form-control wards ">
                    <option>Chọn Xã/Phường</option>

                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label for="inputState"> <strong> phí vận chuyển</strong> </label>
                  <input type="text" class="form-control feeship" name="feeship">
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-3">
                        <button type="button" class="btn btn-primary delivery">Thêm </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div><!-- end col -->
      </div><!-- end row -->
      <div id="load_delivery">

      </div>
    </div>
  </div><!-- end col -->
</div>{{-- --}}
@endsection