
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>xKash Pay- স্বাগতম আমাদের লটারি প্ল্যাটফর্মে!</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
        <!-- load all Font Awesome styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
        <!-- owl carousel css -->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
            <!-- main css -->
        <!--<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />-->
        <!-- responsive css -->
        <!--<link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />-->
        <!-- rtl version css -->
        <!--<link rel="stylesheet" href="{{asset('frontend/assets/css/rtl-version.css')}}" />-->
        <!-- template settings css -->
        <!--<link rel="stylesheet" href="{{asset('frontend/assets/css/template-settings.css')}}" />-->
        <!--Custom Css-->
        <!--<link rel="stylesheet" href="{{asset('frontend/assets/css/custom1.css')}}" />-->
        <!--<link rel="stylesheet" href="{{asset('frontend/assets/css/custom_responsive.css')}}" />-->

    </head>
    <body>
        <div class="content" style="width:100%; max-width:550px; margin: 0 auto;">
            <div class="">
                <!-- preloader begin -->
                <div class="preloader">
                    <div class="loader"><div></div><div></div><div></div><div></div></div>
                </div>
                <!-- preloader end -->
                
                <!-- header begin -->
                <div class="header">
                    <div class="header-inner">

                        <a href="/" class="logo">
                            <img src="assets/img/xlogo.png" alt="Logo">
                        </a>

                        <button id="menuToggle" class="menu-toggle">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                    </div>

                    <nav id="mobileMenu" class="mobile-menu">
                        <ul>
                            <li><a href="/" class="active">হোম</a></li>
                            <li><a href="lotteries.html">সকল লটারি</a></li>
                            <li><a href="winners.html">বিজয়ীরা</a></li>

                            @auth
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>
                            @endauth

                            @guest
                                <li>
                                    <a href="{{ route('login') }}">
                                        সাইন ইন
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('register') }}">
                                        সাইন আপ
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>
                <!-- header end -->

        
                @yield('content')
       

                <!-- footer begin -->
                <div class="footer">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="part-about">
                                        <div class="footer-logo">
                                            <a href='/poklotto/'>
                                                <img src="{{ asset('assets/img/xlogo.png') }}" alt="" class="logo">
                                            </a>
                                        </div>
                                        <p>লটারি খেলোয়াড়রা বাংলাদেশের যেকোনো জায়গা থেকে ফোন, ট্যাবলেট বা কম্পিউটারে অনলাইনে লটারি খেলতে পারেন।</p>
                                        <ul class="importants-links">
                                            <li class="single-link">
                                                <a href="#">policy</a>
                                            </li>
                                            <li class="single-link">
                                                <a href="#">Terms</a>
                                            </li>
                                            <li class="single-link">
                                                <a href="#">FAQ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="container">
                            <div class="footer-bottom-content">
                                <p class="copyright-text">copyright © 2026. all right reserved by xKash-Pay</p>
                                <ul class="social-link">
                                    <li class="single-social">
                                        <a href="#0">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="single-social">
                                        <a href="#0">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="single-social">
                                        <a href="#0">
                                            <i class="fa-brands fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="footer-menu">
                                    <ul>
                                        <li>
                                            <a class='single-menu' href="index.html">home</a>
                                        </li>
                                        <li>
                                            <a class='single-menu' href="lotteries.html">Lotteries</a>
                                        </li>
                                        <li>
                                            <a class='single-menu' href="winners.html">Winners</a>
                                        </li>
                                        <li>
                                            <a class='single-menu' href="contact.html">contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer end -->

                <!-- back to button begin -->
                <div class="back-to-top-btn">
                    <a href="#">
                        <i class="fa-solid fa-arrow-turn-up"></i>
                    </a>
                </div>
            
            <!-- back to top button end -->

            </div>
            
        </div>

        <!-- jQuery js -->
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- owl carousel js -->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- lottery js initialize -->
        <script src="{{ asset('assets/js/lotteries-initialization.js') }}"></script>
        @stack("scripts")
    </body>
</html>