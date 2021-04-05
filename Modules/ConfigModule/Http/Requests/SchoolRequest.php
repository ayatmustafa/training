<?php

namespace Modules\ConfigModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                "short_name"  => 'required|unique:schools_translations,short_name',
                "long_name"   => "required|string|max:50|unique:schools_translations,long_name",
                "branch_name" => "required|string|max:50|unique:schools_translations,branch_name",
                'lat'            => "required|max:50",
                'lng'            => "required|max:50",
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
