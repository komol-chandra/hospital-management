<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FrontendUserRequest extends FormRequest
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
            "name"      => ['required', Rule::unique('users', 'name')->ignore($this->doctor, 'id')],
            "email"     => ['required', Rule::unique('users', 'email')->ignore($this->doctor, 'id')],
            "mobile"    => ['required', Rule::unique('users', 'mobile')->ignore($this->doctor, 'id')],
            "password"  => 'required',
            "birthday"  => 'nullable',
            "gender"    => 'nullable',
        ];
    }
}
