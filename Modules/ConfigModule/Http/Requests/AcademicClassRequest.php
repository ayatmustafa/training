<?php

namespace Modules\ConfigModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicClassRequest extends FormRequest
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
            'name'        => 'string|required|unique:academic_classes,name',
            'user_id'    => 'exists:users,id',
        ];
    }
    public function messages()
    {
        return ['name.unique' => 'this class already exists'];
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
