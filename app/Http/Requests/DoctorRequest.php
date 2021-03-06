<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        return [
            "full_name"     => 'required',
            "name"          => ['required', Rule::unique('users', 'name')->ignore($this->doctor, 'id')],
            "email"         => ['required', Rule::unique('users', 'email')->ignore($this->doctor, 'id')],
            "mobile"        => ['required', Rule::unique('users', 'mobile')->ignore($this->doctor, 'id')],
            // "email"         => 'required |unique:users,email,' . $doctor . ',id',
            "password"      => 'required',
            "address"       => 'nullable',
            // "mobile"        => 'required|unique:users,mobile' . $doctor . ',id',
            "birthday"      => 'nullable',
            "gender"        => 'nullable',
            "picture"       => 'mimes:png,jpg,jpeg',
            "blood_id"      => 'nullable',
            "designation"   => 'nullable',
            "department_id" => 'required',
            "phone"         => 'nullable',
            "biography"     => 'nullable',
            "specialist"    => 'nullable',
            "feeNew"        => 'nullable',
            "feeInMonth"    => 'nullable',
            "feeReport"     => 'nullable',
            "salary"        => 'nullable',
            "status"        => 'required',
        ];
    }
}
