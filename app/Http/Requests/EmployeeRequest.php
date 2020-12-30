<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $employee = $this->route('employee');
        return [
            "email"    => 'required |unique:employees,email,' . $employee . ',id',
            "roll_id"  => "required",
            "name"     => "required",
            "address"  => "nullable",
            "phone"    => "nullable",
            "mobile"   => "required",
            "birthday" => "nullable",
            "gender"   => "required",
            "blood_id" => "nullable",
            "picture"  => "mimes:png,jpg,jpeg",
            "status"   => "required",
        ];
    }
}
