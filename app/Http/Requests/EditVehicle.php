<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditVehicle extends FormRequest
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
            'category'          => 'required|in:car,scooter',
            'brand'             => 'required|string',
            'type'              => 'required|string',
            'color'             => 'required|string',
            'current_place'     => 'required|string',
            'available'         => 'required|numeric',
            'licence_plate'     => 'required|string',
            'kilometer'         => 'required|numeric',
            'serial_number'     => 'required|string',
            'date_purchase'     => 'required|date_format:Y-m-d H:i:s',
            'buying_price'      => 'required|numeric',
            'day_price'         => 'required|numeric',
            'battery_level'     => 'required|numeric',
        ];
    }
}
