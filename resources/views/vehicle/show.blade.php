@include("layouts.header")
<!--== Header Area End ==-->

<!--== Gallery Page Content Start ==-->
<section id="gallery-page-content" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="popular-cars-wrap">
                    <!-- Filtering Menu -->
                    <div class="popucar-menu text-center">
                        <a href="#" data-filter="*" class="active">Vehicles</a>
                    </div>
                    <!-- Filtering Menu -->

                    <div class="row popular-car-gird">
                        <input type="hidden" id="start_date" value="{{ $startDate }}">
                        <input type="hidden" id="end_date" value="{{ $endDate }}">
                        <input type="hidden" id="start_hour" value="{{ $startHour }}">
                        <input type="hidden" id="end_hour" value="{{ $endHour }}">
                        <input type="hidden" id="place" value="{{ $sPlace }}">
                        <!-- Single Popular Car Start -->

                        @foreach($vehicles as $vehicle )
                            <div class="col-lg-4 col-md-6 con suv mpv">
                                <div class="single-popular-car">
                                    <div class="p-car-thumbnails">
                                        <a class="car-hover" href="{{ asset('front/img/car/'.$vehicle->picture) }}">
                                            <img class="picture_vehicle" id="{{ asset('front/img/car/'.$vehicle->picture) }}" src="{{ asset('front/img/car/'.$vehicle->picture) }}" alt="">
                                        </a>
                                    </div>

                                    <div class="p-car-content">
                                        <h3>
                                            <p class="id_vehicle" id="{{ $vehicle->id }}">
                                            <p class="type_vehicle" id="{{ $vehicle->type }}">{{ $vehicle->type }}</p>
                                            <p class="brand_vehicle" id="{{ $vehicle->brand }}">{{ $vehicle->brand }}</p>
                                            <div>
                                                <span class="price" id="{{ $vehicle->day_price}}"><i class="fa fa-tag"></i>Prix par jour :{{ $vehicle->day_price}}€</span>
                                                <input type="hidden" name="days" id="{{ $iDays }}">
                                            </div>
                                        </h3>
                                        <div class="p-car-feature">
                                            <a href="#">{{ $vehicle->color }}</a>
                                            <a href="#">{{ $vehicle->battery_brand }}</a>
                                            <a href="#">manual</a>
                                            <a href="#">AIR CONDITION</a>
                                        </div>
                                    </div>
                                    <button data-toggle="modal" class=" get-touch map-show book-now-btn modal-booking" data-target="#myModal">Réserver</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->
<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Récapitulatif de votre commande</h4>
            </div>
            <div class="modal-body">
                    <img id="vehicle_picture">

                <form action="" method="POST" class="" name="form">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-6 control-label">Vous avez choisis</label>
                        <div class="col-md-8">
                            <input type="hidden" id="vehicle_id">
                            <span id="vehicle_name"></span>
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Départ</label>
                        <div class="col-md-12">
                            <span id="date_checkin"></span> depuis
                            <span id="place_checkin"></span> à <span id="hour_checkin"></span>
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Retour</label>
                        <div class="col-md-12">

                            <span id="date_checkout"></span>
                            <span id="place_checkin"></span>  à  <span id="hour_checkout"></span>
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group" max-width="100">
                        <label class="col-md-8 control-label">Prix total de la location de base</label>
                        <span id="booking_price"></span>€
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Age </label>
                        <div class="col-md-12">
                            <input type="number" id="age" name="age" min="18" max="90" placeholder="18" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Mobile</label>
                        <div class="col-md-12">
                            <input type="tel"  id="phone" name="phone"  placeholder="0664 76 89 84" pattern="[0-9]{10}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Adresse </label>
                        <div class="col-md-12 ">
                            <input type="text" id="address" name="address" placeholder="2 rue du Haut Bois" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Code postale</label>
                        <div class="col-md-12">
                            <input type="text" id="cp" name="cp" placeholder="750012" pattern="[0-9]{5}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Numero de permis </label>
                        <div class="col-md-12">
                            <input type="text" id="driving_licence" name="driving_licence" placeholder="1277DJUSB" required>
                        </div>
                    </div>
                    <p><input type="checkbox" required name="terms"> J'accepte les <u>Termes et Conditions</u></p>
                    <div class="fetched-data">

                    </div>
                </form>
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary booking_comfirm">Comfirmer</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--fin  Modal -->

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
                                <li><i class="fa fa-map-marker"></i>Paris</li>
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
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made  by <a href="/" target="_blank">VRENT</a>
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
<script>
    $(function() {

        $('.modal-booking').click(function () {
            var id_vehicle = $(this).parent().find("p[class='id_vehicle']").attr('id');
            var type_vehicle = $(this).parent().find("p[class='type_vehicle']").attr('id');
            var brand_vehicle = $(this).parent().find("p[class='brand_vehicle']").attr('id');

            let iDays = $(this).parent().find("input[name='days']").attr('id');
            let price_vehicle = $(this).parent().find("span[class='price']").attr('id');
            var picture_vehicle = $(this).parent().find("img[class='picture_vehicle']").attr('id');
            var depart = $("#start_date").val();
            var arrive = $("#end_date").val();

            var departHour = $("#start_hour").val();
            var arriveHour = $("#end_hour").val();

            var place = $("#place").val();

            $('#vehicle_name').html(type_vehicle.toUpperCase() + ' ' + brand_vehicle.toUpperCase());
            $('#vehicle_id').attr('value', id_vehicle);
            $('#vehicle_picture').attr('src', picture_vehicle);
            $('#vehicle_picture').attr('width', 100);
            $('#vehicle_picture').attr('height', 100);

            $('#date_checkin').html(depart);
            $('#date_checkout').html(arrive);

            $('#hour_checkin').html(departHour);
            $('#hour_checkout').html(arriveHour);

            $('#place_checkin').html(place);

            if (iDays === 0) {
                iDays = 1;
            }
            $('#booking_price').html((iDays * price_vehicle));
        });

        //----------------------------------------------------------------------------

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //----------------------------------------------------------------------------

        $('input').click(function () {
            $('.fetched-data').html('')
        });

        $('.booking_comfirm').click(function() {
            @auth
                if($("form")[0].checkValidity()) {
                    var price = $('#booking_price').html();
                    $.ajax({
                        method: 'POST',
                        url: '/booking/create',
                        data: {
                            vehicle_id      : $('#vehicle_id').val(),
                            start_date      : $('#date_checkin').html(),
                            end_date        : $('#date_checkout').html(),
                            start_hour      : $('#hour_checkin').html(),
                            end_hour        : $('#hour_checkout').html(),
                            place           : $('#place_checkin').html(),
                            days            : $('#days').val(),
                            age             : $('#age').val(),
                            phone           : $('#phone').val(),
                            address         : $('#address').val(),
                            cp              : $('#cp').val(),
                            driving_licence : $('#driving_licence').val()
                        },
                        dataType: "json"
                    })

                    .done(function (response) {
                        error();
                    })

                    .fail(function () {
                        //success();
                        $('.modal').click();
                        window.location.href = "/stripe/index/"+price;

                    });

                } else {
                      error();
                }
            @else
                window.location.href = "/login";
            @endauth
        });

        //-----------------------------------------------------------------

        function error() {
             $('.fetched-data').html("<span class='text-warning'>Le formulaire ne semble pas être bien remplit</span>");
        }

        function success() {
            $('.fetched-data').html("<span class='text-success'>BRAVO! Vous allez bientôt être redirigé vers la page de paiement ... </span>");
        }
    });
</script>
</body>