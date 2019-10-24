<?php

declare(strict_types=1);

namespace App\Providers\Tools;

class Constant
{
	Const CATEGORIES  	= [
		'car',
		'scooter',
	];

    Const BATTERRYBRAND = [
        'c_n' 	=> 'Cadmium nickel',
        'n_m_h' => 'Nickel métal hydrure',
        'l' 	=> 'Lithium',
        'l_i' 	=> 'Lithium-ion',
    ];


//--------------------------------------------------------------------------------------

	Const NEEDLES     	= [
		'cities',
		'category',
		'startDate',
		'endDate',
		'price_end',
		'price_end',
	];

//--------------------------------------------------------------------------------------

	Const DAYS			= 1;

//--------------------------------------------------------------------------------------

	Const STARTHOUR		= '07:00';

//--------------------------------------------------------------------------------------

	Const ENDHOUR		= '19:00';

//--------------------------------------------------------------------------------------

	Const PLACE			= 'Paris';
}
