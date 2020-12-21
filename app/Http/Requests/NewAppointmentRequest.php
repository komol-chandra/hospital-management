<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAppointmentRequest extends FormRequest
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
        $appointment = $this->route('new_appointments');
        return [
            // "email"         => 'nullable |unique:new_appointments,email,' . $appointment . ',id',
            "email"         => "required",
            "name"          => 'required',
            "mobile"        => 'required',
            "date"          => 'required',
            "department_id" => 'required',
            "doctor_id"     => 'required',
            "message"       => 'nullable',
        ];
    }
}
