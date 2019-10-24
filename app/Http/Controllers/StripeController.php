<?php

namespace App\Http\Controllers;

use App\Booking;
use DemeterChain\B;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Cartalyst\Stripe\Laravel\Facades\Stripe as e;
//use Cartalyst\Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Stripe;
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

         $queryBuilder = Booking::join('vehicle', 'vehicle.id', '=', 'vehicle_id' )->select(['booking.id','vehicle.type As type','vehicle.brand As brand'])->where([
             'user_id' => Auth::id(),
         ])->latest('booking.created_at')->first();

         if(is_object($queryBuilder) && $iBooking = $queryBuilder->id) {
             $type = $queryBuilder->type;
             $brand = $queryBuilder->brand;
             return view('stripe.stripe', compact( 'iPrice', 'iBooking', 'type', 'brand'));
         }

        return view('vehicle/search');
    }

/**
    public function index(Request $request)
    {
        $iPrice = $request->price;

        $queryBuilder = Booking::select('id')->where([
            'user_id' => Auth::id(),
        ])->latest()->first();

        $stripe = new Stripe();
        $stripe::setApiKey('sk_test_x5TBqaYsUEpjkNs4V7kavpCQ00itifTEmi');
        $sess = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'T-shirt',
                'description' => 'Comfortable cotton t-shirt',
                'images' => ['https://example.com/t-shirt.png'],
                'amount' => $iPrice * 100,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
        ]);

        if(is_object($queryBuilder) && $iBooking = $queryBuilder->id) {
            $iBooking = $queryBuilder->id;

            return view('stripe/stripee', compact( 'iPrice', 'iBooking', 'sess'));
        }
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

        Booking::where('id', $request->get('booking') )->upadate(['status'=> 'payed']);

        return $stripe;
    }
}
