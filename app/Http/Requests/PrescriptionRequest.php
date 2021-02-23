<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
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
            "date"                => "required",
            "patient_id"          => "required",
            "doctor_id"           => "required",
            "history"             => "nullable",
            "note"                => "nullable",
            "old_prescription_id" => "nullable",
            "medicine"            => "required",
            "day"                 => "required",
            "duration"            => "required",
            "sequence"            => "required",
            "instruction"         => "required",

        ];
    }
    public function messages()
    {
        return [
            'patient_id.required'  => 'Patient Name Field is Required',
            'doctor_id.required'   => 'Doctor Name Field is Required',
            'status.required'      => 'Status Field is Required',
            'medicine.required'    => 'medicine Name Field is Required',
            'duration.required'    => 'Duration Field is Required',
            'sequence.required'    => 'Sequence Field is Required',
            'day.required'         => 'day Field is Required',
            'instruction.required' => 'Instruction Field is Required',
        ];
    }
}
