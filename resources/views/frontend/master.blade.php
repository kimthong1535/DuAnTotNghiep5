<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHONG VŨ</title>
  <link rel="shortcut icon" href="{{ asset ('Frontend/images/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('Frontend/libs/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{asset ('Frontend/fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset ('Frontend/libs/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" type="text/css"
        href="{{ asset ('Frontend/libs/owlcarousel/assets/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/style1.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/sweetalert.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/cart.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/post.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/post_details.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/checkout.css') }}">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/accout.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
   
  @routes
</head>

<body>
  <input type="hidden" name="" id="url_to" value="{{ URL::to('/') }}">
  <?php
    if (auth()->check()) {
      $cart = \App\Models\Client\Cart::where('user_id', auth()->user()->id)->get();
    }else{
      $cart = null;
    }
  ?>
  @include('frontend.Home.layout.header',['cart' => $cart])


  @yield('content')

  @include('frontend.Home.layout.footer')
    
  <script type="text/javascript" src="{{ asset ('Frontend/js/jquery-3.5.0.min.js') }} "></script>
  <script type="text/javascript" src="{{ asset ('Frontend/libs/owlcarousel/owl.carousel.min.js')}} "></script>
  <script type="text/javascript" src="{{ asset ('Frontend/libs/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset ('Frontend/js/countdown.js ') }}"></script>
  <script src="{{ asset ('Frontend/js/index.js') }} "></script>
  <script src="{{ asset ('Frontend/js/sweetalert.js') }} "></script>
  <script src="{{ asset ('Frontend/js/client.js') }} "></script>
  <script src="{{ asset ('Frontend/js/accout.js') }} "></script>
  <script src="{{ asset ('Frontend/js/cart.js') }} "></script>
   
  
</body>

</html>