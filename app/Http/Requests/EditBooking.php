<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBooking extends FormRequest
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
            'id_booking'        => 'required|numeric',
            'start_date'        => 'required|date_format:Y-m-d',
            'end_date'          => 'required|date_format:Y-m-d',
            'status'            => 'required|in:payed,waiting_payment,running,finished',
            'place'             => 'required|string',
            'price'             => 'required|numeric',
            'age'               => 'required|numeric',
            'phone'             => 'required|numeric',
            'address'           => 'required|string',
            'driving_licence'   => 'required|alpha_num',
        ];
    }
}
