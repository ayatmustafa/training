<?php

namespace Modules\ConfigModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionSubjectUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // enhancement remove the subject_id duplication and make all roles on one place
        return [
            'subject_id'  => 'required|unique:grade_subjects,division_subject_id|exists:subjects,id',
            'division_id' => 'required|exists:divisions,id'
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
