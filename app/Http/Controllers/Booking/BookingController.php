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
		if (!$iVehicle = is_numeric($request->input('vehicle_id')) ? $request->input('vehicle_id'): null) {
			return response('no valid entry', 419);
		}

		$sStartDate                	= $request->input('start_date');
		$sEndDate                   = $request->input('end_date');
		$sStartHour                	= $request->input('start_hour');
		$sEndHour                   = $request->input('end_hour');
		$sAge                       = $request->input('age');
		$sPhone                     = $request->input('phone');
		$sAddress                   = $request->input('address');
		$sCp                        = $request->input('cp');
		$sDrivingLicence            = $request->input('driving_licence');

		if (!Tools::validateDate($sStartDate) || !Tools::validateDate($sEndDate)) {
			return response('Date troubles', 501);
		}
		if (!Tools::validateHour($sStartHour) || !Tools::validateHour($sEndHour)) {
			return response('Hour troubles', 501);
		}

		$iDays 					= Tools::days($sStartDate, $sEndDate);

		$sStartDate				= Tools::formateDate($sStartDate);
		$sEndDate				= Tools::formateDate($sEndDate);

		$iPriceDay 				= Vehicle::select('day_price')->where('id', $iVehicle)->first();

		if (!is_numeric($iPriceDay->day_price)) {

			return response('No vehicle day price returned', 501);
		}

		$iPrice					= ($iDays * $iPriceDay->day_price);
		$sPlace                	= htmlspecialchars($request->input('place'));

		/** rend indisponible le vehicule à d'autre reservations */
		Vehicle::where('id',(int) $iVehicle)
            ->update(['available'=> 0]);

		Booking::insert([
			'user_id' 			=> Auth::id(),
			'vehicle_id' 		=> (int) $iVehicle ,
			'start_date' 		=> $sStartDate,
			'end_date' 			=> $sEndDate,
			'start_hour' 		=> $sStartHour,
			'end_hour' 			=> $sEndHour,
			'place' 			=> strip_tags($sPlace),
			'price' 			=> $iPrice,
			'age'               => $sAge,
			'phone'             => $sPhone,
			'address'           => $sAddress." ".$sCp ,
			'driving_licence'   => $sDrivingLicence,
			'status' 			=> 'waiting_payment',
            'created_at'        => date('Y-m-d H-i-s')
		]);

		return response('Nous avons bien enregistré votre choix, vous allez être redirigé vers la page de paiement...', 200);
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
