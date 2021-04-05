<?php

namespace Modules\Config\Http\Requests;

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
            [
                'translations.en.short_name'  => 'required|string|unique:schools_translations,short_name',
                'translations.en.long_name'   => 'required|string|unique:schools_translations,long_name',
                'translations.en.branch_name' => 'required|string|unique:schools_translations,branch_name',
                'translations.ar.short_name'  => 'required|string|unique:schools_translations,short_name',
                'translations.ar.long_name'   => 'required|string|unique:schools_translations,long_name',
                'translations.ar.branch_name' => 'required|string|unique:schools_translations,branch_name',
                'translations.ar.address'     => 'required|string|unique:schools_translations,address',
                'translations.en.address'     => 'required|string|unique:schools_translations,address',
                'lat'                         => "required|max:50",
                'lng'                         => "required|max:50",
                "contacts"                    =>  "required|array"
            ]
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
