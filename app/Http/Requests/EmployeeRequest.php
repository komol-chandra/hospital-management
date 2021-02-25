<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            "full_name" => 'required',
            "name"      => ['required', Rule::unique('users', 'name')->ignore($this->employee, 'id')],
            "email"     => ['required', Rule::unique('users', 'email')->ignore($this->employee, 'id')],
            "mobile"    => ['required', Rule::unique('users', 'mobile')->ignore($this->employee, 'id')],
            "password"  => 'required',
            "type"      => 'required',
            "address"   => 'nullable',
            "birthday"  => 'nullable',
            "gender"    => 'nullable',
            "picture"   => 'mimes:png,jpg,jpeg',
            "blood_id"  => 'nullable',
            "status"    => 'nullable',
        ];
    }
}
