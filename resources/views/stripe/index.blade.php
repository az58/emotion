</script>
$(function ({


    var stripe = Stripe('pk_test_OoCPpc9etI0PjDfj0v9X5XTL00a7zLtf0V');
    stripe.redirectToCheckout({
    // Make the id field from the Checkout Session creation API response
    // available to this file, so you can provide it as parameter here
    sessionId: '{{ sessionId }}'
    }).then(function (result) {
    // If redirectToCheckout fails due to a browser or network
    // error, display the localized error message to your customer
    // using result.error.message.
    });
})
</script>