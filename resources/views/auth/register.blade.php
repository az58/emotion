@include('layouts.header')
<!--== Login Page Content Start ==-->
<section id="lgoin-page-wrap" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-page-content">
                    <div class="login-form">
                        <h3>Sign Up</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="login-other">
                        <span class="or">or</span>
                        <a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Signup With Facebook</a>
                        <a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Signup With Google</a>
                    </div>
                    <div class="create-ac">
                        <p>Have an account? <a href="login.html">Sign In</a></p>
                    </div>
                    <div class="login-menu">
                        <a href="about.html">About</a>
                        <span>|</span>
                        <a href="contact.html">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Login Page Content End ==-->

< <!-- Footer Bottom Start -->
<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
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
    <img src="" alt="Vrent">
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

