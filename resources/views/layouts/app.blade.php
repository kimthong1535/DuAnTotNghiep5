<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('frontend/libs/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/libs/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/libs/owlcarousel/assets/owl.theme.default.min.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="{{ asset ('Frontend/css/register.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/dang-nhap.css') }}">
</head>

<body>
  @yield('content')
  
  <script type="text/javascript" src="{{ asset('frontend/js/jquery-3.5.0.min.js') }} "></script>
  <script type="text/javascript" src="{{ asset('frontend/libs/owlcarousel/owl.carousel.min.js') }} "></script>
  <script type="text/javascript" src="{{ asset('frontend/libs/bootstrap/js/bootstrap.bundle.js') }}"></script>
   
  <script src="{{ asset('frontend/js/countdown.js ') }}"></script>
  <script src="{{ asset('frontend/js/index.js') }} "></script>
</body>

</html>