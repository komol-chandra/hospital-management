<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientTestRequest extends FormRequest
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
            "test_id"    => "required",
            "doctor_id"  => "required",
            "patient_id" => "required",
            "details"    => "required",
            "file"       => "nullable| mimes:png,jpg,pdf,docx,doc,odt",
            "status"     => "required",
        ];
    }
    public function messages()
    {
        return [
            'test_id.required'    => 'Test Type Field is Required',
            'file.mimes'          => 'File type only png,jpg,pdf,docx,doc,dot excepted',
            'doctor_id.required'  => 'doctor name required',
            'patient_id.required' => 'patient name required',
            'details.nullable'    => 'Details nullable',
            'status.required'     => 'Status  required',
        ];
    }
}
