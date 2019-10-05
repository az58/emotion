@include("layouts.app")
<head>
    <!--=== Bootstrap CSS ===-->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{ asset('front/css/plugins/slicknav.min.css') }}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{ asset('front/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{ asset('front/css/plugins/owl.carousel.min.css') }}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{ asset('front/css/plugins/gijgo.css') }}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{ asset('front/css/font-awesome.css') }}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{ asset('front/css/reset.css') }}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{ asset('front/style.css') }}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

<!--== Preloader Area Start ==-->
<div class="preloader">
    <div class="preloader-spinner">
        <div class="loader-content">
            <img src="{{ asset('front/img/preloader.gif') }}" alt="JSOFT">
        </div>
    </div>
</div>
<!--== Preloader Area End ==-->

<!--== Header Area Start ==-->
<header id="header-area" class="fixed-top">
    <!--== Header Top Start ==-->
    <div id="header-top" class="d-none d-xl-block">
        <div class="container">
            <div class="row">
                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-3 text-left">
                    <i class="fa fa-map-marker"></i> 802/2, Mirpur, Dhaka
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-3 text-center">
                    <i class="fa fa-mobile"></i> +1 800 345 678
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-3 text-center">
                    <i class="fa fa-clock-o"></i> Mon-Fri 09.00 - 17.00
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Social Icons Start ==-->
                <div class="col-lg-3 text-right">
                    <div class="header-social-icons">
                        <a href="#"><i class="fa fa-behance"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <!--== Social Icons End ==-->
            </div>
        </div>
    </div>
    <!--== Header Top End ==-->

    <!--== Header Bottom Start ==-->
    <div id="header-bottom">
        <div class="container">
            <div class="row">
                <!--== Logo Start ==-->
                <div class="col-lg-4">
                    <a href="index.html" class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="JSOFT">
                    </a>
                </div>
                <!--== Logo End ==-->

                <!--== Main Menu Start ==-->
                <div class="col-lg-8 d-none d-xl-block">
                    <nav class="mainmenu alignright">
                        <ul>
                            <li><a href="#">Home</a>
                                <ul>
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index2.html">Home 2</a></li>
                                    <li><a href="index3.html">Home 3</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">services</a></li>
                            <li><a href="#">Cars</a>
                                <ul>
                                    <li><a href="car-left-sidebar.html">Car Left Sidebar</a></li>
                                    <li><a href="car-right-sidebar.html">Car Right Sidebar</a></li>
                                    <li><a href="car-without-sidebar.html">Car Without Sidebar</a></li>
                                    <li><a href="car-details.html">Car Details</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="index.html">Pages</a>
                                <ul>
                                    <li><a href="package.html">Pricing</a></li>
                                    <li><a href="driver.html">Driver</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="help-desk.html">Help Desk</a></li>
                                    <li><a href="login.html">Log In</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="article.html">Blog Page</a></li>
                                    <li><a href="article-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!--== Main Menu End ==-->
            </div>
        </div>
    </div>
    <!--== Header Bottom End ==-->
</header>
<!--== Header Area End ==-->

<!--== Gallery Page Content Start ==-->
<section id="gallery-page-content" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="popular-cars-wrap">
                    <!-- Filtering Menu -->
                    <div class="popucar-menu text-center">
                        <a href="#" data-filter="*" class="active">all</a>
                        <a href="#" data-filter=".con">Conver</a>
                        <a href="#" data-filter=".hat">Truck</a>
                        <a href="#" data-filter=".mpv">MPV</a>
                        <a href="#" data-filter=".sedan">Sedan</a>
                        <a href="#" data-filter=".suv">SUV</a>
                    </div>
                    <!-- Filtering Menu -->

                    <div class="row popular-car-gird">
                        <!-- Single Popular Car Start -->

                        @foreach($vehicles as $vehicle )

                        <div class="col-lg-4 col-md-6 con suv mpv">
                            <div class="single-popular-car">
                                <div class="p-car-thumbnails">
                                    <a class="car-hover" href="{{ $vehicle->picture }}">
                                        <img src="{{ $vehicle->picture }}" alt="">
                                    </a>
                                </div>

                                <div class="p-car-content">
                                    <h3>
                                        <p>{{ $vehicle->type }}</p>
                                        <p>{{ $vehicle->brand }}</p>
                                        <div>
                                            <span class="price"><i class="fa fa-tag"></i>Prix par jour :{{ $vehicle->day_price}}€</span>
                                        </div>

                                    </h3>

                                    <div class="p-car-feature">
                                        <a href="#">{{ $vehicle->color }}</a>
                                        <a href="#">{{ $vehicle->battery_brand }}</a>
                                        <a href="#">manual</a>
                                        <a href="#">AIR CONDITION</a>
                                    </div>
                                </div>
                            </div>
                            <a href='/vehicle/store<?= "?id=$vehicle->id&startDate=$startDate&endDate=$endDate&iDays=$iDaysgit branch" ?>'>
                                <button>Réserver</button>
                            </a>
                        </div>
                        <!-- Single Popular Car End -->
                        @endforeach







                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->

<!--== Footer Area Start ==-->
<section id="footer-area">
    <!-- Footer Widget Start -->
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h2>About Us</h2>
                        <div class="widget-body">
                            <img src="{{ asset('front/img/logo.png') }}" alt="">
                            <p>Lorem ipsum dolored is a sit ameted consectetur adipisicing elit. Nobis magni assumenda distinctio debitis, eum fuga fugiat error reiciendis.</p>

                            <div class="newsletter-area">
                                <form action="index.html">
                                    <input type="email" placeholder="Subscribe Our Newsletter">
                                    <button type="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Single Footer Widget End -->

                <!-- Single Footer Widget Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h2>Recent Posts</h2>
                        <div class="widget-body">
                            <ul class="recent-post">
                                <li>
                                    <a href="#">
                                        Hello Bangladesh!
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Lorem ipsum dolor sit amet
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Hello Bangladesh!
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        consectetur adipisicing elit?
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Widget End -->

                <!-- Single Footer Widget Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h2>get touch</h2>
                        <div class="widget-body">
                            <p>Lorem ipsum doloer sited amet, consectetur adipisicing elit. nibh auguea, scelerisque sed</p>

                            <ul class="get-touch">
                                <li><i class="fa fa-map-marker"></i> 800/8, Kazipara, Dhaka</li>
                                <li><i class="fa fa-mobile"></i> +880 01 86 25 72 43</li>
                                <li><i class="fa fa-envelope"></i> kazukamdu83@gmail.com</li>
                            </ul>
                            <a href="https://goo.gl/maps/b5mt45MCaPB2" class="map-show" target="_blank">Show Location</a>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Widget End -->
            </div>
        </div>
    </div>


    <!-- Footer Widget End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</section>
<!--== Footer Area End ==-->

<!--== Scroll Top Area Start ==-->
<div class="scroll-top">
    <img src="{{ asset('front/img/scroll-top.png') }}" alt="JSOFT">
</div>
<!--== Scroll Top Area End ==-->

<!--=======================Javascript============================-->
<!--=== Jquery Min Js ===-->
<script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script>
<!--=== Jquery Migrate Min Js ===-->
<script src="{{ asset('front/js/jquery-migrate.min.js') }}"></script>
<!--=== Popper Min Js ===-->
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<!--=== Gijgo Min Js ===-->
<script src=" {{ asset('front/js/plugins/gijgo.js') }}"></script>
<!--=== Vegas Min Js ===-->
<script src="{{ asset('front/js/plugins/vegas.min.js') }}"></script>
<!--=== Isotope Min Js ===-->
<script src="{{ asset('front/js/plugins/isotope.min.js') }}"></script>
<!--=== Owl Caousel Min Js ===-->
<script src="{{ asset('front/js/plugins/owl.carousel.min.js') }}"></script>
<!--=== Waypoint Min Js ===-->
<script src="{{ asset('front/js/plugins/waypoints.min.js') }}"></script>
<!--=== CounTotop Min Js ===-->
<script src="{{ asset('front/js/plugins/counterup.min.js') }}"></script>
<!--=== YtPlayer Min Js ===-->
<script src="{{ asset('front/js/plugins/mb.YTPlayer.js') }}"></script>
<!--=== Magnific Popup Min Js ===-->
<script src="{{ asset('front/js/plugins/magnific-popup.min.js') }}"></script>
<!--=== Slicknav Min Js ===-->
<script src="{{ asset('front/js/plugins/slicknav.min.js') }}"></script>

<!--=== Mian Js ===-->
<script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>



