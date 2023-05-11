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
          <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
              <div class="col-sm-12">
                <table id="datatable" class="table table-bordered ">
                  <thead class="thead-light">
                    <tr role="row">
                      <th>Duyệt</th>
                      <th>người bình luận </th>
                      <th>Bình luận</th>
                      <th>Bài viết</th>
                      <th>ngày Bình luận</th>
                      <th>Quản lý</th>
                    </tr>
                  </thead>
                  <tbody id="table_category">
                    @foreach ($commemt as $value )
                    <tr role="row" class="odd">
                      @if($value->status == 1)
                      <td> <input data-status="0" data-commemt_id="{{ $value->commemt_id }}"
                               id="{{ $value->commemt_post_id }}" type="button"
                               class="btn btn-danger btn-xs commemt_duyet" value="Bỏ Duyệt"> </td>
                      @else
                      <td> <input data-status="1" data-commemt_id="{{ $value->commemt_id }}"

                               id="{{ $value->commemt_post_id }}"
                               type="button" class="btn btn-success btn-xs commemt_duyet" value=" chưa Duyệt"> </td>
                      @endif
                      <td>{{ $value->name }}</td>
                      <td>
                        {{ $value->commemt }}
                        <ul>
                          @foreach ($commemt as $key => $reply )
                          @if($reply->commemt_parent_commemt == $value->commemt_id)
                          <li class="rep"> {{ $reply->commemt }}</li>
                          @endif
                          @endforeach
                        </ul>
                        @if($value->status == 1 )
                        <br /> <textarea
                                  class=" form-control reply_commemt_{{ $value->commemt_id }}" name=""
                                  id="reply_commemt" cols="30"
                                  rows="3"></textarea>
                        <form>
                          @if(auth()->check())
                          <input type="hidden" class="user_id" value="{{ auth()->user()->id }}">
                          @endif
                        </form>
                        <br /> <button class="btn btn-primary btn-xs btn-reply-commemt"
                                data-post_id="{{ $value->commemt_post_id }} "
                                data-commemt_id=" {{ $value->commemt_id }}">
                          Phản hồi</button>
                        @endif

                      </td>
                      <td> <a
                           href="{{ url('/post-detail/'.$value->commemt_post_id) }}">{{ $value->post_title }}</a>
                      </td>
                      <td>{{ $value->created_at }}</td>
                      {{-- ================active========================= --}}
                      {{-- ================active========================= --}}
                      <td>
                        <a class=" btn btn-danger"
                           onclick="return confirm('bạn có muốn xóa Bình luận này')"
                           href=""> <i class="fa fa-trash"></i> Xóa bình luận</a>
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