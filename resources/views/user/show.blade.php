@include("layouts.header")


<!--== Gallery Page Content Start ==-->
<section id="gallery-page-content" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="popular-cars-wrap">
                    <!-- Filtering Menu -->
                    <div class="popucar-menu text-center">
                        <a href="#" data-filter="*" class="active">Mes informations</a>
                    </div>
                    <!-- Filtering Menu -->
                    <div class="p-car-content">
                        @foreach($user as $row )
                        <h3>
                            <p class="user_firstname" id="">Prénom : {{ $row->firstname }}</p>
                            <p class="user_lastname" id="">Nom : {{ $row->lastname }}</p>
                            <p class="user_email" id="">Mail : {{ $row->email }}</p>
                        </h3>
                        <div class="p-car-feature">
                            <a href="#">{{ $row->role }}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="popucar-menu text-center">
                        <a href="#" data-filter="*" class="active">Mes reservations</a>
                    </div>
                    <div class="row popular-car-gird">
                        @forelse($bookings as $booking )
                            <div class="col-lg-4 col-md-6 con suv mpv">
                                <div class="single-popular-car">
                                    <div class="p-car-thumbnails">
                                        <a class="car-hover" href="{{ asset('front/img/car/'.$booking->picture) }}">
                                            <img class="picture_vehicle" id="{{ asset('front/img/car/'.$booking->picture) }}" src="{{ asset('front/img/car/'.$booking->picture) }}" alt="">
                                        </a>
                                    </div>

                                    <div class="p-car-content">
                                        <h3>
                                            <p class="id_vehicle" id="">{{ $booking->id }}</p>
                                            <p class="type_vehicle" id="">{{ $booking->type }}</p>
                                            <p class="brand_vehicle" id="">{{ $booking->licence }}</p>
                                            <div>
                                                <span class="price" id="price"><i class="fa fa-tag"></i>Prix de la location: {{ $booking->price }}€</span>
                                                <input type="hidden" name="days" id="">
                                            </div>
                                        </h3>
                                        <div class="p-car-feature">
                                            <a href="#">{{ $booking->start_date }}</a>
                                            <a href="#">{{ $booking->end_date }}</a>
                                            <a href="#">{{ $booking->place}}</a>
                                            <a href="#">AIR CONDITION</a>
                                        </div>
                                    </div>
                                    <button data-toggle="modal" class=" get-touch map-show modal-booking book-now-btn" data-target="#myModal">
                                        @if($booking->status != "waiting_payment")
                                            Facture
                                            @else
                                            En attente de paiement
                                        @endif
                                    </button>
                                </div>
                            </div>
                        @empty
                            <span class="text-success text-center">Vous n'avez pas encore de  </span> <span class="text-warning"> &nbsp;<a href="/vehicle/search">location </a></span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->
<!-- Trigger the modal with a button -->


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
                        {{----}}
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
                                <li><i class="fa fa-map-marker"></i> Paris</li>
                                <li><i class="fa fa-mobile"></i> +33 6 65 93 87 92</li>
                                <li><i class="fa fa-envelope"></i> webmaster@vrent.fr</li>
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
    <img src="{{ asset('front/img/scroll-top.png') }}" alt="VRENT">
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
<!--<script src="{{ asset('front/js/plugins/isotope.min.js') }}"></script>-->
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