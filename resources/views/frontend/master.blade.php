<!DOCTYPE html>
<html>

<head>
    <base href="{{ asset('layout/frontend') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Vietpro Shop - @yield('title')</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
        $(function() {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function() {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
</head>

<body>
    <!-- header -->
    <header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="{{ asset('home') }}"><img src="img/home/logo.png" alt="Logo"></a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                        <i class="fa fa-bars"></i>
                    </a></nav>
                </h1>
            </div>
            <div id="search" class="col-md-5 col-sm-12 col-xs-12">
                <form class="form-inline my-2 my-lg-0" role="search" method="get" action="{{ url('search') }}">
                    <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" name="result">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <a class="display" href="{{ asset('cart') }}">Giỏ hàng</a>
                <a href="{{ asset('cart') }}">{{ Cart::count() }}</a>
            </div>
            <div class="auth-links col-md-2 col-sm-12 col-xs-12">
                <ul>
                    <li><a href="{{ asset('register') }}">Đăng kí</a> | <a href="{{ asset('login') }}">Đăng nhập</a></li>
                    <!-- <li></li> -->
                </ul>
            </div>
        </div>
    </div>
</header>

    <!-- endheader -->

    <!-- main -->
    <section id="body">
        <div class="container">
            <div class="row">
                <div id="sidebar" class="col-md-3">
                    <nav id="menu">
                        <ul>
                            <li class="menu-item">Danh mục sản phẩm</li>
                            @foreach($categories as $cate)
                            <li class="menu-item"><a href="{{ asset('category/' . $cate->cate_id . '/' . $cate->cate_slug . '.html') }}" title="">{{ $cate->cate_name }}</a></li>
                            @endforeach
                        </ul>
                        <!-- <a href="#" id="pull">Danh mục</a> -->
                    </nav>

                    <div id="banner-l" class="text-center">
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
                        </div>
                    </div>
                </div>
                @yield('main')
            </div>
        </div>
    </section>
    <!-- endmain -->

    <!-- footer -->
    <footer id="footer">
        <div id="footer-t">
            <div class="container">
                <div class="row">
                    <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                        <a href="#"><img src="img/home/logo.png" alt="Logo"></a>
                    </div>
                    <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>About us</h3>
                        <p class="text-justify">Vietpro Academy thành lập năm 2009. Chúng tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập trình Website & Mobile nhằm cung cấp cho thị trường CNTT Việt Nam những lập trình viên thực sự chất lượng, có khả năng làm việc độc lập, cũng như Team Work ở mọi môi trường đòi hỏi sự chuyên nghiệp cao.</p>
                    </div>
                    <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Hotline</h3>
                        <p>Phone Sale: (+84) 0988 550 553</p>
                        <p>Email: sirtuanhoang@gmail.com</p>
                    </div>
                    <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Contact Us</h3>
                        <p>Address 1: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
                        <p>Address 2: Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà Nội</p>
                    </div>
                </div>
            </div>
            <div id="footer-b">
                <div class="container">
                    <div class="row">
                        <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>Học viện Công nghệ Vietpro - www.vietpro.edu.vn</p>
                        </div>
                        <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>© 2017 Vietpro Academy. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
                <div id="scroll">
                    <a href="#"><img src="img/home/scroll.png" alt="Scroll"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- endfooter -->
</body>

</html>