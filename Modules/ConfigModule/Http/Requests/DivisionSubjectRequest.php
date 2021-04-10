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
        return [
            'subject_id'  => 'unique:division_subjects,division_id',
            'subject_id'  => ['required','unique:division_subjects,division_id','exists:subjects,id'],
            'division_id' => 'required|exists:divisions,id',
            'user_id'     => 'required|exists:users,id',
            'gradeIds'    => 'required|array|exists:grades,id'
        ];
    }
    public function messages()
    {
        return [
            'gradeIds.exists' => 'grade id does not valid'
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
