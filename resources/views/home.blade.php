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

            $('#price_start').on('input',function() {
                $('#price_start_value').html($(this).val() );
            });

            $('#price_end').on('input',function() {
                $('#price_end_value').html($(this).val() );
            });

            $('#book').click(function() {
                var result  = '#result-content';
                $.ajax({
                    method: 'POST',
                    url: '/ajaxCreate',
                    data: {
                        range :$('input[name="daterange"]').val(),
                        cities :$('#cities-select option:selected').text()
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    $(result).html('');
                    $(result).append('<ul></ul>');
                    $.each(data.vehicle, function (key, value) {
                        let ul = $(result+'> ul');
                        ul.append('<li class="n-b-md data-result">' +
                            ''+value.id+' '+value.category+' '+value.type+' '+value.color+' '+value.battery_brand+' '+value.current_place+'</li>');
                    });
                })
                .fail(function(data,status) {
                    result.text('no vehicle found');
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
            height: 70vh;
            width: 100vw;
        }

        .bottom-height {
            height: 20vh;
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

        .data-result {
            font-size: 24px;
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

        .n-b-md {
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
                        <select class="custom-select" id="cities-select" name="cities">
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
    <div id="result-content" class="bottom-height flex-center">
        {{--   Search Result zone   --}}
        <p>Filter settings:</p>

        <div>
            <input type="range" id="price_start" name="price_start" min="10" max="100" value="10" step="1">
            <span id="price_start_value"></span>
            <label for="price_start">Price Min</label>
        </div>

        <div>
            <input type="range" id="price_end" name="price_end" min="100" max="1000" value="150" step="1">
            <span id="price_end_value"></span>
            <label for="price_end">Price Max</label>
        </div>
    </div>
{{--        for windows--}}
{{--    @php $fmt = new NumberFormatter( 'fr_FR', NumberFormatter::CURRENCY );--}}
{{--                echo $fmt->formatCurrency( false, "EUR") @endphp--}}
{{--    for UNIx and MACOS number_format(%i,value)--}}

    @section('scripts')
    @endsection

    @extends('layouts/footer')
</body>
</html>
