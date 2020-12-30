<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            "name"        => "required",
            "account_id"  => "required",
            "pay_to"      => "required",
            "description" => "nullable",
        ];
    }
    public function messages()
    {
        return [
            'name.required'       => 'Name Field is Required',
            'account_id.required' => 'Account Name Field is Required',
            'pay_to.required'     => 'Pay To Field is Required',
        ];
    }
}
