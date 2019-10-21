<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--=== Favicon ===-->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  <title>VRENT</title>

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
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#price_end').on('change',function() {
                $('#price_end_value').html($(this).val() + '€');
            });

          // $('#startHour, #endHour').on('change',function() {
          //   if(!validateHhMm($(this).val())) {
          //     $(this).attr('value', '07:00')
          //   }
          // });
          //
          // function validateHhMm(inputField) {
          //   var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
          //
          //   if (isValid) {
          //     inputField.style.backgroundColor = '#bfa';
          //   } else {
          //     inputField.style.backgroundColor = '#fba';
          //   }
          //
          //   return isValid;
          // }
        });
    </script>
</head>

<body class="loader-active">

<!--== Preloader Area Start ==-->
<div class="preloader">
  <div class="preloader-spinner">
    <div class="loader-content">
      <img src="{{ asset('front/img/preloader.gif') }}" alt="">
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
            @foreach($users as $user)
                @endforeach

           <?php
            if (Auth::check()) {
              echo 'Bienvenue '.$user->firstname;
             }
             ?>
        </div>
        <!--== Single HeaderTop End ==-->

        <!--== Single HeaderTop Start ==-->
        <div class="col-lg-3 text-center">
          <i class="fa fa-mobile"></i> +33 1 22 33 44 11
        </div>
        <!--== Single HeaderTop End ==-->

        <!--== Single HeaderTop Start ==-->
        <div class="col-lg-3 text-center">
          <i class="fa fa-clock-o"></i> Lundi-Samedi 09.00 - 20.00
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
            <img src="{{ asset('front/img/logo.png') }}" alt="JSOFT">
          </a>
        </div>
        <!--== Logo End ==-->

        <!--== Main Menu Start ==-->
        <div class="col-lg-8 d-none d-xl-block">
          <nav class="mainmenu alignright">
            <ul>
              <li class="active"><a href="#">Home</a></li>
              <li><a href="/vehicle/search">Cars</a></li>
              <li><a href="">Mon compte</a>
                <ul>
                  <li><a href="/register">S'enregistrer</a></li>
                  <li><a href="/login">Se connecter</a></li>
                  @auth
                    <li><a href="/logout">Sortir</a></li>
                  @endauth
                </ul>
              </li>
              @auth
                <?php if (\Illuminate\Support\Facades\Auth::user()->role = 'admin') {?>
                <li><a href="/admin">Admin</a></li>
                <?php }?>
              @endauth
              <li><a href="/home#about-area">About</a></li>
              <li><a href="/home#contact">Contact</a></li>
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

<!--== Slider Area Start ==-->
<section id="slider-area">
  <!--== slide Item One ==-->
  <div class="single-slide-item overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="book-a-car">
            <form action="/vehicle/search" method="post">
              @csrf
              <!--== Pick Up Location ==-->
              <div class="pickup-location book-item">
                <h4>PICK-UP LOCATION:</h4>
                <select class="custom-select" name="cities">
                    <option selected value="paris">Paris</option>
                    @foreach ($aCities as $key => $row)
                        <option value="{{ $row }}">{{ $row }}</option>
                    @endforeach
                </select>
              </div>
              {{-- var days--}}
              <?php
                $sToday     = Carbon\Carbon::today();
                $sAWeek     = Carbon\Carbon::tomorrow()->addDays(7);
              ?>
              {{-- end var days--}}
              <!--== Pick Up Date ==-->
              <div class="pick-up-date book-item">
                <h4>PICK-UP DATE:</h4>
                <input id="startDate" name="startDate" placeholder="<?= $sToday->format('m/d/Y');?>" value="<?= $sToday->format('m/d/Y');?>" />
                <input type="time" id="startHour" name="startHour" min="07:00" max="19:00" value="07:00" required>
                <div class="return-car">
                  <h4>Return DATE:</h4>
                  <input id="endDate" name="endDate" placeholder="<?= $sAWeek->format('m/d/Y');?>" value="<?= $sAWeek->format('m/d/Y');?>" />
                  <input type="time" id="endHour" name="endHour" min="07:00" max="19:00" value="19:00" required>
                </div>
              </div>
              <!--== Car Choose ==-->
              <div class="choose-car-type book-item" >
                <h4>CHOOSE CAR TYPE:</h4>
                <select class="custom-select" name="category">
                  <option value="car">Car</option>
                  <option value="scooter">Scooter</option>
                  <option selected value="">Car and Scooter</option>
                </select>
              </div>
              <!--== Car Choose ==-->

                <div class="">
                  <p>Moins de:</p>
                  <div>
                    <input type="range" id="price_end" name="price_end" min="100" max="1000" value="150" step="1">
                    <span class="cobalt-Icon" id="price_end_value"></span>
                  </div>
                </div>

              <div class="book-button text-center">
                  <button class="book-now-btn">Book Now</button>

              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-7 text-right">
          <div class="display-table">
            <div class="display-table-cell">
              <div class="slider-right-text">
                <h1>BOOK A CAR TODAY!</h1>
                <p>FOR AS LOW AS $10 A DAY PLUS 15% DISCOUNT <br> FOR OUR RETURNING CUSTOMERS</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== slide Item One ==-->
</section>
<!--== Slider Area End ==-->

<!--== About Us Area Start ==-->
<section id="about-area" class="section-padding">
  <div class="container">
    <div class="row">
      <!-- Section Title Start -->
      <div class="col-lg-12">
        <div class="section-title  text-center">
          <h2>About us</h2>
          <span class="title-line"><i class="fa fa-car"></i></span>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
      </div>
      <!-- Section Title End -->
    </div>

    <div class="row">
      <!-- About Content Start -->
      <div class="col-lg-6">
        <div class="display-table">
          <div class="display-table-cell">
            <div class="about-content">
              <p>Lorem simply dummy is a texted of the printing costed and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aliquid debitis optio praesentium, voluptate repellat accusantium deserunt eius.</p>
              <div class="about-btn">
                <a href="#">Book a Car</a>
                <a href="#">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- About Content End -->

      <!-- About Video Start -->
      <div class="col-lg-6">
        <div class="about-video">
          <iframe src="https://player.vimeo.com/video/121982328?title=0&byline=0&portrait=0"></iframe>
        </div>
      </div>
      <!-- About Video End -->
    </div>
  </div>
</section>
<!--== About Us Area End ==-->


<!--== Services Area Start ==-->
<section id="service-area" class="section-padding">
  <div class="container">
    <div class="row">
      <!-- Section Title Start -->
      <div class="col-lg-12">
        <div class="section-title  text-center">
          <h2>Our Services</h2>
          <span class="title-line"><i class="fa fa-car"></i></span>
        </div>
      </div>
      <!-- Section Title End -->
    </div>


    <!-- Service Content Start -->
    <div class="row">
      <!-- Single Service Start -->
      <div class="col-lg-4 text-center">
        <div class="service-item">
          <i class="fa fa-taxi"></i>
          <h3>RENTAL CAR</h3>
        </div>
      </div>
      <!-- Single Service End -->

      <!-- Single Service Start -->
      <div class="col-lg-4 text-center">
        <div class="service-item">
          <i class="fa fa-cog"></i>
          <h3>CAR REPAIR</h3>
        </div>
      </div>
      <!-- Single Service End -->

      <!-- Single Service Start -->
      <div class="col-lg-4 text-center">
        <div class="service-item">
          <i class="fa fa-map-marker"></i>
          <h3>TAXI SERVICE</h3>
        </div>
      </div>
      <!-- Single Service End -->

      <!-- Single Service Start -->
      <div class="col-lg-4 text-center">
        <div class="service-item">
          <i class="fa fa-life-ring"></i>
          <h3>life insurance</h3>
        </div>
      </div>
      <!-- Single Service End -->

      <!-- Single Service Start -->
      <div class="col-lg-4 text-center">
        <div class="service-item">
          <i class="fa fa-bath"></i>
          <h3>car wash</h3>
        </div>
      </div>
      <!-- Single Service End -->

      <!-- Single Service Start -->
      <div class="col-lg-4 text-center">
        <div class="service-item">
          <i class="fa fa-phone"></i>
          <h3>call driver</h3>
          <p></p>
        </div>
      </div>
      <!-- Single Service End -->
    </div>
    <!-- Service Content End -->
  </div>
</section>
<!--== Services Area End ==-->

<!--== Fun Fact Area Start ==-->
<section id="funfact-area" class="overlay section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-11 col-md-12 m-auto">
        <div class="funfact-content-wrap">
          <div class="row">
            <!-- Single FunFact Start -->
            <div class="col-lg-4 col-md-6">
              <div class="single-funfact">
                <div class="funfact-icon">
                  <i class="fa fa-smile-o"></i>
                </div>
                <div class="funfact-content">
                  <p><span class="counter">550</span>+</p>
                  <h4>HAPPY CLIENTS</h4>
                </div>
              </div>
            </div>
            <!-- Single FunFact End -->

            <!-- Single FunFact Start -->
            <div class="col-lg-4 col-md-6">
              <div class="single-funfact">
                <div class="funfact-icon">
                  <i class="fa fa-car"></i>
                </div>
                <div class="funfact-content">
                  <p><span class="counter">250</span>+</p>
                  <h4>CARS IN STOCK</h4>
                </div>
              </div>
            </div>
            <!-- Single FunFact End -->

            <!-- Single FunFact Start -->
            <div class="col-lg-4 col-md-6">
              <div class="single-funfact">
                <div class="funfact-icon">
                  <i class="fa fa-bank"></i>
                </div>
                <div class="funfact-content">
                  <p><span class="counter">50</span>+</p>
                  <h4>office in cities</h4>
                </div>
              </div>
            </div>
            <!-- Single FunFact End -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--== Fun Fact Area End ==-->

<!--== Choose Car Area Start ==-->
<section id="choose-car" class="section-padding">
  <div class="container">
    <div class="row">
      <!-- Section Title Start -->
      <div class="col-lg-12">
        <div class="section-title  text-center">
          <h2>Choose your Car</h2>
          <span class="title-line"><i class="fa fa-car"></i></span>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
      </div>
      <!-- Section Title End -->
    </div>

    <div class="row">
      <!-- Choose Area Content Start -->
      <div class="col-lg-12">
        <div class="choose-content-wrap">
          <!-- Choose Area Tab Menu -->
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#popular_cars" role="tab" aria-selected="true">popular Cars</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newest_cars" role="tab" aria-selected="false">newest cars</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#office_map" role="tab" aria-selected="false">Our Office</a>
            </li>
          </ul>
          <!-- Choose Area Tab Menu -->

          <!-- Choose Area Tab content -->
          <div class="tab-content" id="myTabContent">
            <!-- Popular Cars Tab Start -->
            <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
              <!-- Popular Cars Content Wrapper Start -->
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

                <!-- PopularCars Tab Content Start -->
                <div class="row popular-car-gird">
                  <!-- Single Popular Car Start -->
                  <div class="col-lg-4 col-md-6 con suv mpv">
                    <div class="single-popular-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-1.jpg">
                          <img src="assets/img/car/car-1.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Dodge Ram 1500</a>
                          <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                        </h3>

                        <h5>HATCHBACK</h5>

                        <div class="p-car-feature">
                          <a href="#">2017</a>
                          <a href="#">manual</a>
                          <a href="#">AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Popular Car End -->

                  <!-- Single Popular Car Start -->
                  <div class="col-lg-4 col-md-6 hat sedan">
                    <div class="single-popular-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-2.jpg">
                          <img src="assets/img/car/car-2.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Dodge Ram 1500</a>
                          <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                        </h3>

                        <h5>HATCHBACK</h5>

                        <div class="p-car-feature">
                          <a href="#">2017</a>
                          <a href="#">manual</a>
                          <a href="#">AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Popular Car End -->

                  <!-- Single Popular Car Start -->
                  <div class="col-lg-4 col-md-6 suv con mpv">
                    <div class="single-popular-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-3.jpg">
                          <img src="assets/img/car/car-3.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Dodge Ram 1500</a>
                          <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                        </h3>

                        <h5>HATCHBACK</h5>

                        <div class="p-car-feature">
                          <a href="#">2017</a>
                          <a href="#">manual</a>
                          <a href="#">AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Popular Car End -->

                  <!-- Single Popular Car Start -->
                  <div class="col-lg-4 col-md-6 con hat">
                    <div class="single-popular-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-4.jpg">
                          <img src="assets/img/car/car-4.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Dodge Ram 1500</a>
                          <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                        </h3>

                        <h5>HATCHBACK</h5>

                        <div class="p-car-feature">
                          <a href="#">2017</a>
                          <a href="#">manual</a>
                          <a href="#">AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Popular Car End -->

                  <!-- Single Popular Car Start -->
                  <div class="col-lg-4 col-md-6 con sedan mpv">
                    <div class="single-popular-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-5.jpg">
                          <img src="assets/img/car/car-5.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Dodge Ram 1500</a>
                          <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                        </h3>

                        <h5>HATCHBACK</h5>

                        <div class="p-car-feature">
                          <a href="#">2017</a>
                          <a href="#">manual</a>
                          <a href="#">AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Popular Car End -->

                  <!-- Single Popular Car Start -->
                  <div class="col-lg-4 col-md-6 hat suv mpv">
                    <div class="single-popular-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-6.jpg">
                          <img src="assets/img/car/car-6.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Dodge Ram 1500</a>
                          <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                        </h3>

                        <h5>HATCHBACK</h5>

                        <div class="p-car-feature">
                          <a href="#">2017</a>
                          <a href="#">manual</a>
                          <a href="#">AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Popular Car End -->
                </div>
                <!-- PopularCars Tab Content End -->
              </div>
              <!-- Popular Cars Content Wrapper End -->
            </div>
            <!-- Popular Cars Tab End -->

            <!-- Newest Cars Tab Start -->
            <div class="tab-pane fade" id="newest_cars" role="tabpanel" aria-labelledby="profile-tab">
              <!-- Newest Cars Content Wrapper Start -->
              <div class="popular-cars-wrap">
                <!-- Filtering Menu -->
                <div class="newcar-menu text-center">
                  <a href="#" data-filter="*" class="active">all</a>
                  <a href="#" data-filter=".toyota">toyota</a>
                  <a href="#" data-filter=".bmw">bmw</a>
                  <a href="#" data-filter=".audi">audi</a>
                  <a href="#" data-filter=".tata">Tata</a>
                </div>

                <!-- Filtering Menu -->

                <!-- NewestCars Tab Content Start -->
                <div class="row newest-car-gird">
                  <!-- Single Newest Car Start -->
                  <div class="col-lg-4 col-md-6 tata audi">
                    <div class="single-new-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-6.jpg">
                          <img src="assets/img/car/car-6.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Toyota RAV4 EV</a>
                          <span class="price"><i class="fa fa-tag"></i> $35/day</span>
                        </h3>

                        <h5>Toyota</h5>

                        <div class="p-car-feature">
                          <a href="#">2018</a>
                          <a href="#">Auto</a>
                          <a href="#">Non AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Newest Car End -->

                  <!-- Single Newest Car Start -->
                  <div class="col-lg-4 col-md-6 bmw tata toyota">
                    <div class="single-new-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-5.jpg">
                          <img src="assets/img/car/car-5.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Toyota RAV4 EV</a>
                          <span class="price"><i class="fa fa-tag"></i> $35/day</span>
                        </h3>

                        <h5>Toyota</h5>

                        <div class="p-car-feature">
                          <a href="#">2018</a>
                          <a href="#">Auto</a>
                          <a href="#">Non AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Newest Car End -->

                  <!-- Single Newest Car Start -->
                  <div class="col-lg-4 col-md-6 bmw">
                    <div class="single-new-car">
                      <div class="p-car-thumbnails">
                        <a class="car-hover" href="assets/img/car/car-4.jpg">
                          <img src="assets/img/car/car-4.jpg" alt="JSOFT">
                        </a>
                      </div>

                      <div class="p-car-content">
                        <h3>
                          <a href="#">Toyota RAV4 EV</a>
                          <span class="price"><i class="fa fa-tag"></i> $35/day</span>
                        </h3>

                        <h5>Toyota</h5>

                        <div class="p-car-feature">
                          <a href="#">2018</a>
                          <a href="#">Auto</a>
                          <a href="#">Non AIR CONDITION</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Single Newest Car End -->
                </div>
                <!-- NewestCars Tab Content End -->
              </div>
              <!-- Newest Cars Content Wrapper End -->
            </div>
            <!-- Newest Cars Tab End -->

            <!-- Office Map Tab -->
            <div class="tab-pane fade" id="office_map" role="tabpanel" aria-labelledby="contact-tab">
              <div class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.6538067244583!2d90.37092511435942!3d23.79533919297639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0cce3251ab1%3A0x7a2aa979862a9643!2sJSoft!5e0!3m2!1sen!2sbd!4v1516771096779"></iframe>
              </div>
            </div>
            <!-- Office Map Tab -->
          </div>
          <!-- Choose Area Tab content -->
        </div>
      </div>
      <!-- Choose Area Content End -->
    </div>
  </div>
</section>
<!--== Choose Car Area End ==-->


<!--== Footer Area Start ==-->
<section id="footer-area">
  <!-- Footer Widget Start -->
  <div class="footer-widget-area">
    <div class="container">
      <div class="row">

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

              <ul class="get-touch" id="contact">
                <li><i class="fa fa-map-marker"></i> 12 rue Claude Tillier, Paris, France</li>
                <li><i class="fa fa-mobile"></i>  +33 1 22 33 44 11</li>
                <li><i class="fa fa-envelope"></i> vrent@gmail.com</li>
              </ul>

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
          <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Vrent</a>
         </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Bottom End -->
</section>
<!--== Footer Area End ==-->

<!--== Scroll Top Area Start ==-->
<div class="scroll-top">
  <img src="{{ asset('front/img/scroll-top.png"') }}" alt="">
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

</html>