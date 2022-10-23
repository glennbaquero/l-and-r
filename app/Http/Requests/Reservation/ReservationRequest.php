<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
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
            'passenger.cellphone_number' => ['required'],
            'passenger.email' => ['required','email'],
            'passenger.first_name' => ['required'],
            'passenger.gender' => ['required', Rule::notIn(['none'])],
            'passenger.last_name' => ['required'],
            'passenger.with_infant' => ['boolean'],
            'passenger.infant_gender' => ['required_if:passenger.with_infant,true'],
            'passenger.infant_firstname' => ['required_if:passenger.with_infant,true'],
            'passenger.infant_lastname' => ['required_if:passenger.with_infant,true'],
            'passenger.payment.expiry_month' => ['required', Rule::notIn(['none'])],
            'passenger.payment.expiry_year' => ['required', Rule::notIn(['none'])],
            'passenger.payment.card_number' => ['required'],
            'passenger.payment.cvv' => ['required'],
            'passenger.ticket_type' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            // 'passenger.infant_gender.in' => 'The infant gender field is required.',
            'passenger.infant_gender.required_if' => 'The infant gender field is required.',
            'passenger.infant_firstname.required_if' => 'The infant first name field is required.',
            'passenger.infant_lastname.required_if' => 'The infant last name field is required.',
            'passenger.cellphone_number.required' => 'The phone number field is required.',
            'passenger.email.required' => 'The email field is required.',
            'passenger.first_name.required' => 'The first name field is required.',
            'passenger.last_name.required' => 'The last name field is required.',
            'passenger.gender.required' => 'The gender field is required.',
            'passenger.gender.not_in' => 'The gender field is required.',
            'passenger.ticket_type.required' => 'The ticket type field is required.',
            'passenger.payment.expiry_year.integer' => 'The expiry year field is required.',
            'passenger.payment.expiry_year.not_in' => 'The expiry year field is required.',
            'passenger.payment.expiry_month.not_in' => 'The expiry month field is required.',
            'passenger.payment.card_number.required' => 'The card number field is required.',
            'passenger.payment.cvv.required' => 'The cvv field is required.',
            'passenger.payment.expiry_year.required' => 'The expiry year field is required.',
            'passenger.payment.expiry_month.required' => 'The expiry month field is required.',
        ];
    }
}
