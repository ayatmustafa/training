<?php

namespace Modules\ConfigModule\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClassesUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'division_id' => 'required|exists:divisions,id',
            'grade_id'    => 'required|exists:grades,id',
            'name'        => ['string','required',Rule::unique('classes', 'name')->ignore($this->grad_id, 'grade_id')],
            'user_id'     => 'exists:users,id',
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
