<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $iPrice = $request->price;

        return view('stripe.stripe', ['price' => $iPrice]);
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
            'amount' => $request->get('iPrice') * 100
        ]);

        return $stripe;
    }
}
