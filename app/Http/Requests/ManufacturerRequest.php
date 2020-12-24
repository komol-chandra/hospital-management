<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerRequest extends FormRequest
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
        $manufacturer = $this->route('manufacturer');
        return [
            "email"   => 'required |unique:manufacturers,email,' . $manufacturer . ',id',
            "name"    => 'required',
            "mobile"  => 'required',
            "address" => 'nullable',
            "address" => 'nullable',
            "details" => 'nullable',
            "picture" => 'nullable|mimes:png,jpg,jpeg',
        ];

    }
    public function messages()
    {
        return [
            'email.required'  => 'Email Field is Required',
            'name.required'   => 'Name Field is Required',
            'mobile.required' => 'Mobile Field is Required',
            'picture.mimes'   => 'picture Field support only jpg,jpeg and png file',
        ];
    }
}
