<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe as e;
use Cartalyst\Stripe\Stripe;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
/* $iPrice = $request->price;

        return view('stripe.stripe', compact( 'iPrice'));
*/


        $stripe = new Stripe();
        $stripe::setApiKey('sk_test_jWWKdFyljvdnfJbjevs74kQH000tfdnAdA');
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'T-shirt',
                'description' => 'Comfortable cotton t-shirt',
                'images' => ['https://example.com/t-shirt.png'],
                'amount' => 500,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
        ]);
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stripe = Stripe::charges()->create([
            'source' => $request->get('tokenId'),
            'currency' => 'EUR',
            'amount' => $request->get('amount')*100,
        ]);

        return $stripe;
    }
}
