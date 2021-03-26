<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            "discounted_amount" => 'nullable',
            "vat_amount"        => 'nullable',
            "other_amount"      => 'nullable',
            "grand_total"       => 'nullable',
            "pay"               => 'nullable',
            "due"               => 'nullable',
            "qty"               => 'required',
            "batch"             => 'required',
            "medicine_id"       => 'required',
            "purchase_rate"     => 'required',
            "sale_rate"         => 'required',
            "exp_date"          => 'required',
            "sub_total"         => 'required',
        ];
    }
}
