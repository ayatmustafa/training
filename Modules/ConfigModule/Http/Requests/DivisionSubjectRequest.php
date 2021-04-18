<?php

namespace Modules\ConfigModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DivisionSubjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // enhancement remove the duplicated key subject_id ang group all rules under one key
        return [
            'subject_id'  => ['required','exists:subjects,id'],
            'division_id' => 'required|exists:divisions,id',
            'gradeIds'    => 'required|array'
        ];
    }
    public function messages()
    {
        return [
            'gradeIds.exists' => 'grade id does not valid',
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
