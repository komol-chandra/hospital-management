<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            "title"      => "required",
            "contact"    => "required",
            "email"      => "required",
            "address"    => "required",
            "facebook"   => "nullable",
            "linkedin"   => "nullable",
            "twitter"    => "nullable",
            "instagram"  => "nullable",
            "google"     => "nullable",
            "youtube"    => "nullable",
            "favicon"    => "mimes:png,ico,svg",
            "small_logo" => "mimes:png,jpg,jpeg",
            "logo"       => "mimes:png,jpg,jpeg",
            "white_logo" => "mimes:png,jpg,jpeg",
        ];
    }
}
