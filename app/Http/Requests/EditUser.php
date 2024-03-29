<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
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
            'id_user'        => 'required|numeric',
            'lastname'        => 'required|string',
            'firstname'        => 'required|string',
            'email'            => 'required|email',
            'role'             => 'required|in:buyer,admin',
        ];
    }
}
