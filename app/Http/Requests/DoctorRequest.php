<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
        $doctor = $this->route('doctor');
        return [
            "email"         => 'required |unique:doctors,email,' . $doctor . ',id',
            "name"          => 'required',
            "designation"   => 'nullable',
            "department_id" => 'nullable',
            "address"       => 'nullable',
            "mobile"        => 'required',
            "phone"         => 'nullable',
            "biography"     => 'nullable',
            "specialist"    => 'nullable',
            "birthday"      => 'nullable',
            "blood_id"      => 'nullable',
            "picture"       => 'mimes:png,jpg,jpeg',
            "gender"        => 'required',
            "status"        => 'required',
        ];
    }
}
