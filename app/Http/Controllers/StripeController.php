<?php

namespace App\Http\Controllers;

use App\Booking;
use DemeterChain\B;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe as e;
use Cartalyst\Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

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

         $iBooking = Booking::select('id')->where([
             'user_id' => Auth::id(),
         ])->latest()->first();

         if($iBooking = $iBooking->id) {
             return view('stripe.stripe', compact( 'iPrice', 'iBooking'));
         }

        return view('vehicle/search');
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

        /**
         * A mettre dans la fonction ou est redirigé le payement reussi
         */

        Booking::where('id', $request->get('tokenId') )->upadate(['status'=> 'payed']);

        return $stripe;
    }
}
