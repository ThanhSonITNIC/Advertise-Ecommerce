<!doctype html>
<html lang="en">

<head>
    <base src="{{asset('')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="icon" href="/front/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="/front/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="/front/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="/front/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="/front/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="/front/css/font-awesome.min.css">
    <link rel="stylesheet" href="/front/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="/front/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="/front/css/style.css">

    @yield('css')
</head>

<body>
    @include('front.layouts.header')

    @yield('body')

    @include('front.layouts.footer')

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="/front/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="/front/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="/front/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="/front/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="/front/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="/front/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="/front/js/owl.carousel.min.js"></script>
    <script src="/front/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="/front/js/slick.min.js"></script>
    <script src="/front/js/jquery.counterup.min.js"></script>
    <script src="/front/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="/front/js/custom.js"></script>

    @yield('script')
</body>

</html>