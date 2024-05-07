<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account_id' => 'required|string',
            'ticket_number' => 'required|string',
            'time' => 'required|string',
            'date' => 'required|date',
            'fighting_number' => 'required|integer',
            'bit_type' => 'required|string',
            'amount' => 'required|numeric|between:-99999999.99,99999999.99',
            'rate' => 'required|numeric|between:-99.99,99.99',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
