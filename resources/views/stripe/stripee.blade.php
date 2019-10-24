<script src="https://js.stripe.com/v3/"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var stripe = Stripe('pk_test_74aZGrFdqGsIl2hxXNsqsoYf00qg92oML8');
        stripe.redirectToCheckout({
            // Make the id field from the Checkout Session creation API response
            // available to this file, so you can provide it as parameter here
            sessionId: '{!! json_encode($sess->id) !!}'
            //sessionId: '{{CHECKOUT_SESSION_ID}}'
        }).then(function (result) {
            // If redirectToCheckout fails due to a browser or network
            // error, display the localized error message to your customer
            // using result.error.message.
        });
    });
</script>