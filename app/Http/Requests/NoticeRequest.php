<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            "name"        => "required",
            "designation" => "required",
            "start_date"  => "required",
            "end_date"    => "required",
            "status"      => "required",
        ];
    }
    public function messages()
    {
        return [
            'name.required'        => 'Name Field is Required',
            'designation.required' => 'Designation Field is Required',
            'start_date.required'  => 'start date Field is Required',
            'end_date.required'    => 'end date Field is Required',
        ];
    }
}
