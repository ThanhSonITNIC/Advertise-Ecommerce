<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head >
    <base href="{{asset('')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="icon" href="storage/images/logo/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/front_assets/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="/front_assets/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="/front_assets/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="/front_assets/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="/front_assets/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="/front_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/front_assets/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="/front_assets/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="/front_assets/css/style.css">

    @yield('css')
</head>

<body>
    @include('front.layouts.header')

    @yield('body')

    @include('front.layouts.messenger.facebook')

    @include('front.layouts.footer')

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="/front_assets/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="/front_assets/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="/front_assets/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="/front_assets/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="/front_assets/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="/front_assets/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="/front_assets/js/owl.carousel.min.js"></script>
    <script src="/front_assets/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="/front_assets/js/slick.min.js"></script>
    <script src="/front_assets/js/jquery.counterup.min.js"></script>
    <script src="/front_assets/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="/front_assets/js/custom.js"></script>

    @yield('script')
</body>

</html>