<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class BookingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('booking', compact('response', 'aCountries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		/**
		 * Ceci est une vrai clé de test liée à un veritable compte stripe
		 * @author Lory LETICEE
		 * @see https://stripe.com/docs/api
		 */
		$intent ='';
		// fake test key : sk_test_4eC39HqLyjWDarjtT1zdp7dc
		// real test key : sk_test_x5TBqaYsUEpjkNs4V7kavpCQ00itifTEmi
		Stripe\Stripe::setApiKey('sk_test_x5TBqaYsUEpjkNs4V7kavpCQ00itifTEmi');


		$sItem                      = $request->get('car or scooter name');
		$iPrice                     = $request->get('price of bill');
		$sDays                      = $request->get('nbr jours location');




		$ev	= Stripe\Event::all(['limit' => 10]);

//		Stripe\Charge::create([
//			"amount" => 2000,
//			"currency" => "usd",
//			"source" => "tok_mastercard", // obtained with Stripe.js
//			"metadata" => ["order_id" => "6735"]
//		]);

		$intent = Stripe\PaymentIntent::create([
			'amount' => 1099,
			'currency' => 'usd',
		]);

		$session = Stripe\Checkout\Session::create([
			'payment_method_types' => ['card'],
			'line_items' => [[
				'name' => "Cucumber from Roger's Farm",
				'amount' => 200,
				'currency' => 'usd',
				'quantity' => 10,
			]],
			'payment_intent_data' => [
				//'application_fee_amount' => 200,
			],
			'success_url' => 'https://example.com/success',
			'cancel_url' => 'https://example.com/cancel',
		],
        [
            'transfer_data' => [
                'destination' => 'acct_1F4yV2Gz0utTc5r5',
            ],
		]);


		$ch	= Stripe\Charge::all(['limit' => 10]);


		return view('create', compact('session'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
