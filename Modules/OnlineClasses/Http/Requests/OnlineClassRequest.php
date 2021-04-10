<?php

namespace Modules\OnlineClasses\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineClassRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "date"            => 'required|date|after_or_equal:today',
            "class_start_time"      => "required|date_format:H:i:s",
            "class_end_time"        => "required|date_format:H:i:s|after:class_start_time",
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
