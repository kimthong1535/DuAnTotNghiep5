<header class="" id="header-top">
  <div class="header__banner">
    <div id="js-header-banner" class="owl-carousel owl-theme">
      <div class="item">
        <a href="">
          <img class="" src="{{ asset('Frontend/images/header_banner.jpg') }}" alt="">
        </a>
      </div>
      <div class="item">
        <a href="">
          <img class="" src="{{ asset('Frontend/images/header_banner.jpg') }}" alt="">
        </a>
      </div>
      <div class="item">
        <a href="">
          <img class="" src="{{ asset('Frontend/images/header_banner.jpg') }}" alt="">
        </a>
      </div>
    </div>
    <!-- end #header__banner -->
    <div id="js-close-header-banner" class="btn-close-banner">
      <i class="fal fa-times"></i>
    </div>
    <!-- end .btn-close-banner -->
  </div>
  <!-- end .banner -->
  <div class="header__contact">
    <div class="container">
      <div class="d-flex justify-content-end pt-1 pb-1">
        <a href="" class="header__contact--link">
          <i class="fal fa-building"></i>
          <span class="contact__text">Hệ Thống Showroom</span>
          <span class="contact__text "></span>
        </a>
        <a href="" class="header__contact--link">
          <i class="fal fa-user-headset"></i>
          <span class="contact__text">Tư Vấn Mua Hàng:</span>
          <span class="contact__text text-primary"> 1800 6867</span>
        </a>
        <a href="" class="header__contact--link">
          <i class="fal fa-user-headset"></i>
          <span class="contact__text">CSKH:</span>
          <span class="contact__text text-primary"> 1800 6865</span>
        </a>
        <a href="{{ url('/post') }}" class="header__contact--link">
          <i class="fal fa-newspaper"></i>
          <span class="contact__text">Tin Công Nghệ</span>
          <span class="contact__text"></span>
        </a>
        <a href="" class="header__contact--link">
          <i class="fal fa-cogs"></i>
          <span class="contact__text">Xây Dựng Cấu Hình</span>
          <span class="contact__text"></span>
        </a>
      </div>
    </div>
    <!-- end .container -->
  </div>
  <!-- end .header__contact -->
</header>
<!-- end header -->
<div class="container-fluid bg-white sticky-top">
  <!-- sticky-top -->
  <div
       class="container d-flex flex-nowrap justify-content-between align-items-center align-content-center pt-3 pb-3">
    <div class="header__logo" id="js-header-logo">
      <a href="{{ url('/') }}" class="header__logo--link"><img class="logo__img"
             src="{{ asset('Frontend/images/logo.svg') }}" alt=""></a>
      <a href="" class="header__logo--link"><img class="logo__img"
             src="{{ asset('Frontend/images/logo.svg') }}" alt=""></a>
    </div>
    <!-- end .header__logo -->

    <div class="header__category pl-3" id="js-header-category">
      <button class="btn btn-outline-light"><i class="far fa-bars"></i> Danh mục sản phẩm</button>

      <div class="nav-scroll" id="js-nav-scroll " style="display:none">
        <!-- <div class="container"> -->
        <ul class="nav flex-column align-items-center bg-white">
          {{-- @foreach ($category_all as $value )                        
                     <li class="nav-item ">
                         <a class="nav-link active" href="category_page.html">
                            <i class="fal fa-laptop"></i> {{ $value->category_name }}
          </a>
          </li>
          @endforeach --}}
        </ul>
        <!-- </div> -->
      </div>
      <!-- End .nav-scroll -->
    </div>
    <!-- end .header__category -->

    <div class="header__search pl-3 pr-3">
      <form action="{{ url('/search') }}" method="post" class="header__search--form" autocomplete="off">
        @csrf
        <input type="search" name="keywords" id="keywords" class="search__input" placeholder="Nhập từ khóa cần tìm...">
        <div id="search_ajax"></div>
        <button class="btn search__button "><i class="fal fa-search"></i></button>
      </form>

    </div>
    <!-- end .header__searrch -->

    <div class="header__funtion d-flex pt">
      <a class="header__funtion--link d-flex flex-column align-content-center align-items-center active" href=""
         title="Khuyến mãi">
        <i class="fal fa-tags"></i>
        <span class="js-scroll">Khuyến mãi</span>
      </a>
      <a class="header__funtion--link d-flex flex-column align-content-center align-items-center" href=""
         title="Đơn hàng">
        <i class="fal fa-clipboard-check"></i>
        <span class="js-scroll">Đơn hàng</span>
      </a>
      <a class="header__funtion--link d-flex flex-column align-content-center align-items-center" href=""
         title="Thông báo">
        <i class="fal fa-bell-on"></i>
        <span class="js-scroll">Thông báo</span>
      </a>
      @if(auth()->check())
      <a class=" header__funtion--link d-flex flex-column align-content-center align-items-center hien "
         href="{{ url('/account') }}"
         title="Tài khoản">
        <i class="fal fa-user-circle"></i>
        <span class="js-scroll">{{ auth()->user()->name }}</span>
        <ul class="sub-menu">
          <li class="nav-link" style="list-style: none"><img src="" alt=""> <span style="color: rgb(88, 88, 88)">
              <strong>{{ auth()->user()->name }}</strong> </span></li>
          <li onclick="window.location.href='.{{ url('/account') }}.'" class="nav-link"><i class="fab fa-grav"
               style="font-size:20px;"></i> <span>Thông tin tài
              khoản</span>
          </li>
          <li class="nav-link"><i class="far fa-calendar-check" style="font-size:20px;"></i><span>Quản lí đơn hàng
            </span> </li>
          <li class="nav-link"><i class="far fa-meteor" style="font-size:20px;"></i><span>Số địa chỉ </span></li>
          <li class="nav-link"><i class="far fa-bell" style="font-size:20px;"></i> <span>Thông báo</span> </li>

          <form action="{{ route('logout') }}" method="post">
            @csrf
            <li class="nav-link"> <button type="submit" class="tus">Đăng xuất</button> </li>
            {{-- <a class="dropdown-item"><button type="submit">Logout</a> --}}
          </form>
        </ul>
      </a>
      @else
      <a class="header__funtion--link d-flex flex-column align-content-center align-items-center"
         href="{{ URL::to ('/login') }}"
         title="Giỏ hàng">
        <i class="fal fa-user-circle"></i>
        <span class="js-scroll">Đăng nhập</span>
      </a>
      @endif
      {{-- @if(auth()->check()) --}}
      @if($cart != null )
      <a class="header__funtion--link d-flex flex-column align-content-center align-items-center"
         href="{{ URL::to ('/cart') }}"
         title="Giỏ hàng">
        <i class="fal fa-shopping-cart"></i></i>
        <span class="js-scroll">Giỏ hàng</span>
        <div class="sub-menu1">
          <?php
          $total = 0;
          $qtytotal = 0; 
          ?>
          @foreach ($cart as $value )
          <?php
             $subtotal = $value->price * $value->quantity;
            $total += $subtotal;
            $quantity  = $value->quantity;
            $qtytotal += $quantity;
          ?>
          <div class="row">
            <div class="col-md-3">
              <div class="trap">
                <img src="{{ asset('Backend/uploads/products/'.$value->images) }}" alt="anh">
              </div>
            </div>
            <div class="col-md-9">
              <div class="trap">
                <ul style=" padding-left: 10px; ">
                  <li>{{ $value->name }}</li>
                  <li>Số lượng: {{ $value->quantity }}</li>
                  <li> <strong>{{ number_format($value->price * $value->quantity ,0,',','.') }} đ</strong> </li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
          <hr class="mt-5">
          <div class="row">
            <div class="col-md-6">
              <span class="zz">Tổng tiền ({{ $qtytotal }}) sản phẩm</span>
            </div>
            <div class="col-md-6 text-right">
              <span class="xx">{{ number_format($total,0,',','.') }}đ</span>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <button class="pi">Xem giỏ hàng</button>
            </div>
          </div>
        </div>

      </a>
      @endif
    </div>
    <!-- end .header__function -->

  </div>
</div>
<!-- end .sticky-top -->