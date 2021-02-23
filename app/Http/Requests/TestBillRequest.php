<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestBillRequest extends FormRequest
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
            "mobile"      => "required",
            "date"        => "required",
            "test_id"     => "required",
            "description" => "nullable",
            "quantity"    => "required",
            "price"       => "required",
            "sub_total"   => "required",
            "total"       => "required",
            "vat"         => "required",
            "discount"    => "nullable",
            "grand_total" => "required",
            "paid"        => "nullable",
            "due"         => "required",
            "status"      => "required",
        ];
    }
}
