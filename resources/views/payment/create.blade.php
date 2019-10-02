@extends('layouts.app')

@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('sk_test_x5TBqaYsUEpjkNs4V7kavpCQ00itifTEmi');
        stripe.redirectToCheckout({
            // Make the id field from the Checkout Session creation API response
            // available to this file, so you can provide it as parameter here
            // instead of the .......placeholder.
            sessionId: '{{ $session->id  }}'
        }).then(function (result) {
            // If `redirectToCheckout` fails due to a browser or network
            // error, display the localized error message to your customer
            // using `result.error.message`.
        });
    </script>
    <input id="card-name" type="text" value="{{ $session->amount }}">{!! "<i class='fa fa-".$session->currency."' aria-hidden='true'></i>"!!}
    <!-- placeholder for Elements -->
    <div id="card-element"></div>
    <button id="card-button" data-secret="{{ $session->client_secret }} ">
        Submit Payment
    </button>
@endsection