<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
        $patient = $this->route('patient');
        return [
            "email"    => 'required |unique:patients,email,' . $patient . ',id',
            "code"     => 'unique:patients,code,' . $patient . ',id',
            "name"     => "required",
            "address"  => "nullable",
            "phone"    => "nullable",
            "mobile"   => "required",
            "birthday" => "nullable",
            "gender"   => "required",
            "blood"    => "nullable",
            "picture"  => "mimes:png,jpg,jpeg",
            "status"   => "required",
        ];
    }
}
