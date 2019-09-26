<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Styles -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://kit.fontawesome.com/ec73f164d2.js"></script>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#book').click(function() {
                $.ajax({
                    //method: $(this).attr('method'),
                    method: 'POST',
                    url: '/ajaxCreate',
                    // data: $(this).serialize(),
                    data: $('input[name="daterange"]').val(),
                    dataType: "json"
                })
                .done(function(data) {

                    // $('.alert-success').removeClass('hidden');
                    // $('#myModal').modal('hide');
                    console.log(data);
                })
                .fail(function(data) {
                    console.log('fail');
                    // $.each(data.responseJSON, function (key, value) {
                    //     var input = '#formRegister input[name=' + key + ']';
                    //     $(input + '+small').text(value);
                    //     $(input).parent().addClass('has-error');
                    // });
                });
            });
        });


    </script>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    {{-- var days--}}
    <?php
        $sToday     = Carbon\Carbon::today();
        $sAWeek     = Carbon\Carbon::tomorrow()->addDays(7);
    ?>
    {{-- end var days--}}

    <div class="flex-center position-ref full-height ">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                    <a  href="{{ url('/logout') }}">Logout</a>
                    <a  href="{{ url('booking') }}">Booking</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Booking
            </div>

            <fieldset>
                <legend>En route !</legend>
                <div class="form-group">
                    <div class="row">
                        <label for="date-picker">Du : </label>
                        <input type="text" name="daterange" value="<?php echo $sToday->format('m/d/Y').' - '.$sAWeek->format('m/d/Y'); ?>" id="date-picker"/>
                        <label for="cities-select">À partir de : </label>
                        <select class="custom-select" id="cities-select">
                            <option selected value="447">Paris</option>
                            @foreach ($aCities as $key => $row)
                                <option value="{{ $key }}">{{ $row }}</option>
                            @endforeach
                        </select>
                        <button type="submit" id="book" class="btn btn-info">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </fieldset>
            <div class="row">
                Les membres économisent jusqu’à 40%
                Abonnez-vous pour recevoir des suggestions personnalisées et profiter d’Offres privées vous permettant d’économiser jusqu’à 35%.
            </div>
        </div>
    </div>

    @section('scripts')
    @endsection

    @extends('layouts/footer')
</body>
</html>
