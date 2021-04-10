<?php

namespace Modules\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name"=>'required|string|max:50',
            "middle_name"  => 'required |string|max:50',
            "code"   => "required|numeric",
            "father_first_name" => "required|string|max:50",
            "father_middle_name" => "required|string|max:50",
            "father_last_name" => "required|string|max:50",
            "mother_first_name" => "required|string|max:50",
            "mother_middle_name" => "required|string|max:50",
            "mother_last_name" => "required|string|max:50", 
            "official_email" => "required|string|max:50",
            "father_contact_email_official" => "required|string|max:50",
            
            
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
