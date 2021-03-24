<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            "name"               => "required",
            "type_id"            => "required",
            "generic_id"         => "required",
            "manufacturer_id"    => "nullable",
            "sku"                => "nullable",
            "tax"                => "nullable",
            "details"            => "nullable",
            "per_box"            => "nullable",
            "price"              => "required",
            "picture"            => "mimes:png,jpg,jpeg",
            "dosage"             => "nullable",
            "vat"                => "nullable",
            "unit_type_id"       => "required",
            "single_unit_weight" => "nullable",
            "box_weight"         => "nullable",
            "minimum_unit"       => "nullable",
            "unit_location"      => "nullable",
        ];
    }
    public function messages()
    {
        return [
            'name.required'       => 'Name Field is Required',
            'type_id.required'    => 'Type Name Field is Required',
            'generic_id.required' => 'Generic Name Field is Required',
            'price.required'      => 'Price Field is Required',
            'picture.mimes'       => 'picture Field support only png,jpg,jpeg file',
        ];
    }
}
