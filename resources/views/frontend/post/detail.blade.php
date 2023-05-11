@extends('frontend.master')
@section('content')

<div class="contact">
  <div class="container">
    <div class="row ">
      <div class="col-md-1">

      </div>
      <div class="col-md-9">

        <div class="d-flex flex-row bd-highlight mb-3">
          <div class="p-0 bd-highlight"><a href="{{ url('/') }}">Trang chủ</a> <span>/</span></div>
          <div class="p-0 pl-2 bd-highlight"><a href="{{ url ('/post') }}">Tin tức</a> <span>/</span></div>

          <div class="p-0 pl-2 bd-highlight"><a href="#">{{ $category->category_post_name }}</a></div>

        </div>

      </div>
      <div class="col-md-2">

      </div>
    </div>
    <div class="row">
      <div class="col-md-1">

      </div>
      <div class="col-md-9">
        <div class="tieu_de">
          <h2>{{ $post_detail->post_title }}</h2>
        </div>
      </div>
      <div class="col-md-2">

      </div>

    </div>
    <div class="row mt-4">
      <div class="col-md-1">

      </div>
      <div class="col-md-9">
        {{-- <div class="thong_tin">

          <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-0 bd-highlight"><img src="{{ asset ('frontend/images/avt.jpg') }}" alt="">
      </div>
      <div class="p-2 bd-highlight">Le Huu Phuoc</div>
      <div class="p-2 bd-highlight">17 giờ trước</div>
      <div class="p-2 bd-highlight"><a href="#"><i class="fas fa-comments"></i> <span>3 Bình luận</span> </a>
      </div>
    </div>

  </div> --}}
  <hr>
</div>
<div class="col-md-2">

</div>

</div>
<div class="row">
  <div class="col-md-1">

  </div>

  <div class="col-md-9">
    <p><strong>{!! $post_detail->post_desc !!}</strong></p>
    <hr>
  </div>
  <div class="col-md-2">

  </div>

</div>
<div class="row">
  <div class="col-md-1">

  </div>

  <div class="col-md-9">
    <div class="link_hay">
      <ul style="padding-left: 0px;">
        <li>

          <span class="title_keyword">{!! $post_detail->post_keywords !!}</span>
        </li>


      </ul>
    </div>
    <hr>
  </div>
  <div class="col-md-2">

  </div>

</div>
<div class="row">
  <div class="col-md-1">

  </div>

  <div class="col-md-9">
    <!-- ========== NỘI DUNG ================== -->
    <div class="noi_dung">
      {!! $post_detail->post_content !!}
    </div>
    <!-- ==========END NỘI DUNG ================== -->
    <hr>
  </div>
  <div class="col-md-2">

  </div>

</div>
<div class="row">
  <div class="col-md-1">

  </div>

  <div class="col-md-9">
    <div class="fb-like fb_iframe_widget" data-href="https://developers.facebook.com/docs/plugins/" data-width=""
         data-layout="standard" data-action="like" data-size="small" data-share="true" fb-xfbml-state="rendered"
         fb-iframe-plugin-query="action=like&amp;app_id=576958299560138&amp;container_width=825&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=standard&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;size=small&amp;width=">
      <span style="vertical-align: bottom; width: 450px; height: 28px;"><iframe name="f1cb52cc79c4bd4"
                width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin"
                title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true"
                allowfullscreen="true" scrolling="no" allow="encrypted-media"
                src="https://www.facebook.com/v12.0/plugins/like.php?action=like&amp;app_id=576958299560138&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df177859e3d73d6c%26domain%3D%26is_canvas%3Dfalse%26origin%3Dfile%253A%252F%252F%252Ff28034f76cb366%26relation%3Dparent.parent&amp;container_width=825&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=standard&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;size=small&amp;width="
                style="border: none; visibility: visible; width: 450px; height: 28px;" class=""></iframe></span>
    </div>
    <hr>
  </div>
  <div class="col-md-2">

  </div>

</div>
<div class="row">
  <div class="col-md-12 mt-4 border">

    <h5 class="pl-3 pt-3"><strong>BÀI VIẾT LIÊN QUAN</strong></h5>
    <div class="row">
      @foreach ($releted as $value )
      <div class="col-md-4">
        <a href="{{ url ('/post-detail/'.$value->post_id) }}">
          <div class="media p-3">
            <img src="{{ asset ('Backend/uploads/posts/'.$value->post_images) }}" alt="John Doe" class="mr-3 mt-0 "
                 style="width:120px;">
            <div class="media-body">
              <p> <strong> {{ $value->post_title }}</strong><br>
                <span><small><a href="#">{{ $value->category_post_name }}</a></small></span>
              </p>

            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>

  </div>
</div>
<div class="row mt-5 mb-5">
  <div class="col-md-12 border p-3">
    <h5 class="pt-2 mb-4"> <strong>Hỏi &amp; Đáp</strong> <span class="pding">3</span></h5>
    <form>
      <div class="form mb-5 mic">

        <textarea name="commemt_content" class="commemt_content" id="" cols="130" rows="3"
                  placeholder="Viết bình luận của bạn (Vui lòng gõ tiếng Việt có dấu)"></textarea>
        <button type="button" class=" mau btn send-commemt">Gửi câu hỏi ?</button>

      </div>
    </form>
    <form action="">
      @csrf
      @if (auth()->check())
      <input type="hidden" name="commemt_post_id" class="user_id" value="{{ auth()->user()->id }} ">
      @endif
      <input type="hidden" name="commemt_post_id" class="commemt_post_id" value="{{ $post_detail->post_id}} ">
      <div id="load_commemt">
        <img src="{{ asset ('frontend/images/avt.jpg') }}" class="align-self-start mr-3"
             style="width:60px;border-radius: 5px;">
        <div class="media-body">
          <h4>Media Top</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedcccccccccccccccccccccccccccc do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua.</p>
          <div class="media p-3">s
            <img src="{{ asset ('frontend/images/vu.png') }}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle"
                 style="width:45px;">
            <div class="media-body">
              <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
              <p>Lorem ipsum...</p>
            </div>
          </div>
        </div>
      </div>
  </div>
  </form>
  <!-- Media middle -->

</div>
</div>
</div>
</div>
<div id="fb-root" class=" fb_reset">
  <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
    <div></div>
  </div>
</div>

@endsection