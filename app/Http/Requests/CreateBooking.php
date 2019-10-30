<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBooking extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'start_date'        => 'required|date_format:Y-m-d',
			'end_date'          => 'required|date_format:Y-m-d|after:start_date',
			'start_hour'        => 'required|date_format:H-i',
			'end_hour'          => 'required|date_format:H-i',
			'age'               => 'required|numeric',
			'phone'             => 'required|numeric',
			'address'           => 'required|string',
			'cp'           		=> 'required|numeric',
			'driving_licence'   => 'required|alpha_num',
        ];
    }

	public function messages()
	{
		return [
			'start_date.required'			=> 'A title is required',
			'end_date.required'  			=> 'A message is required',
			'start_date.date_format:Y-m-d' 	=> 'A valid date is required',
			'end_date.date_format:Y-m-d'  	=> 'A valid date is required',
			'start_hour.required'			=> 'A hour is required',
			'end_hour.required'  			=> 'A hour is required',
			'start_hour.date_format:H-i' 	=> 'A valid hour is required',
			'end_hour.date_format:H-i'  	=> 'A valid hour is required',
			'age.required'               	=> 'An age is required',
			'phone.required'             	=> 'A phone is required',
			'address.required'           	=> 'An address is required',
			'cp.required'           		=> 'A cp is required',
			'driving_licence.required'   	=> 'A driving licence is required',
		];
	}
}
