<?php

declare(strict_types=1);

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Providers\Tools\Tools;
use App\Vehicle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    }

	/**
	 * créer une ligne booking et renvoie l'utilisateur vers la page de paiement
	 * @todo Retrun user to stripe payment page
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 * @throws Stripe\Exception\ApiErrorException
	 */
    public function create(Request $request)
    {
		$iBooking_price				= '';

		if(!$iVehicle = is_numeric($request->input('vehicle_id')) ? $request->input('vehicle_id'): null) {
			return response('no valid entry', 419);
		}

		$sStartDate                	= $request->input('start_date');
		$sEndDate                   = $request->input('end_date');
		$sStartHour                	= $request->input('start_hour');
		$sEndHour                   = $request->input('end_hour');

		if(!Tools::validateDate($sStartDate) || !Tools::validateDate($sEndDate)) {
			return response('Date troubles', 501);
		}
		if(!Tools::validateHour($sStartHour) || !Tools::validateHour($sEndHour)) {
			return response('Hour trouble', 501);
		}

			$iDays 					= Tools::days($sStartDate, $sEndDate);

			$sStartDate				= Tools::formateDate($sStartDate);
			$sEndDate				= Tools::formateDate($sEndDate);

			$iPriceDay 				= Vehicle::select('day_price')->where('id', $iVehicle)->first();

			if(!is_numeric($iPriceDay->day_price)){

				return response('No vehicle day price returned', 501);
			}

			$iPrice					= ($iDays * $iPriceDay->day_price);
			$sPlace                	= htmlspecialchars($request->input('place'));
			Booking::insert([
				'user_id' 			=> Auth::id(),
				'vehicle_id' 		=> (int) $iVehicle ,
				'start_date' 		=> $sStartDate,
				'end_date' 			=> $sEndDate,
				'start_hour' 		=> $sStartHour,
				'end_hour' 			=> $sEndHour,
				'place' 			=> strip_tags($sPlace),
				'price' 			=> $iPrice,
				'status' 			=> 'waiting_payment',

			]);

			/**
			 *@author Mounia LYAF
			 *
			 *
			 * ICI MOUNIA TU PEUX CREER TON APEL STRIPE AVEC LES INFOS DU DESSUS SI NECESSAIRE ;)
			 *
			 *
			 *
			 *
			 *
			 *
			 */

			return response('Nous avons bien enregistré votre choix, vous allez être redirigé vers la page de paiement...');




//		/**
//		 * Ceci est une vrai clé de test liée à un veritable compte stripe
//		 * @author Lory LETICEE
//		 * @see https://stripe.com/docs/api
//		 */
//		$intent ='';
//		// fake test key : sk_test_4eC39HqLyjWDarjtT1zdp7dc
//		// real test key : sk_test_x5TBqaYsUEpjkNs4V7kavpCQ00itifTEmi
//		Stripe\Stripe::setApiKey('sk_test_x5TBqaYsUEpjkNs4V7kavpCQ00itifTEmi');
//
//		$ev	= Stripe\Event::all(['limit' => 10]);
//
//		Stripe\Charge::create([
//			"amount" => 2000,
//			"currency" => "usd",
//			"source" => "tok_mastercard", // obtained with Stripe.js
//			"metadata" => ["order_id" => "6735"]
//		]);
//
//		$intent = Stripe\PaymentIntent::create([
//			'amount' => 1099,
//			'currency' => 'usd',
//		]);
//
//		$session = Stripe\Checkout\Session::create([
//			'payment_method_types' => ['card'],
//			'line_items' => [[
//				'name' => "Cucumber from Roger's Farm",
//				'amount' => 200,
//				'currency' => 'usd',
//				'quantity' => 10,
//			]],
//			'payment_intent_data' => [
//				//'application_fee_amount' => 200,
//			],
//			'success_url' => 'https://example.com/success',
//			'cancel_url' => 'https://example.com/cancel',
//		],
//        [
//            'transfer_data' => [
//                'destination' => 'acct_1F4yV2Gz0utTc5r5',
//            ],
//		]);
//
//
//		$ch	= Stripe\Charge::all(['limit' => 10]);
//
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iIdVehicle             = $request->query('id_user', 0);
        $Sstart_date            = $request->query('start_date', '');
        $sEnd_date              = $request->query('end_date', '');
        $sStatus                = $request->query('status ', '');
        $sPlace                 = $request->query('place ', '');
        $sPrice             	= $request->query('price', '');
        $sAge                   = $request->query('age', '');
        $sPhone                 = $request->query('phone', '');
        $sAddress               = $request->query('phone', '');
        $sCp                    = $request->query('cp', '');
        $sCity                  = $request->query('city ', '');
        $sCountry               = $request->query('country  ', '');
        $sDriving_licence       = $request->query('driving_licence  ', '');

        Booking::insert([
            'id_user'           => $iIdVehicle,
            'id_vehicle'        => $iIdVehicle,
            'start_date'        => $Sstart_date,
            'end_date'          => $sEnd_date,
            'status'            => $sStatus,
            'place'             => $sPlace,
            'price'    			=> $sPrice,
            'age'               => $sAge,
            'phone'             => $sPhone,
            'address'           => $sAddress. '' . $sCp . '' . $sCity . '' . $sCountry,
            'driving_licence'   => $sDriving_licence,
        ]);
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
    public function payment(Request $request, $id)
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
