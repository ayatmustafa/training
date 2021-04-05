<?php

namespace Modules\ConfigModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "short_name"  => 'required|string|max:50',
            "long_name"   => 'required|string|max:50',
            "branch_name" => 'required|string|max:50',
            'lat'            => 'required|max:50',
            'lng'            => 'required|max:50',
            "contacts"       => "required|array"
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
