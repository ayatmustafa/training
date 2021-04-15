<?php

namespace Modules\Student\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'first name'        => $this->first_name,
            'middle name'           => $this->middle_name,
            'student code' => $this->code,
            'father First name'=>$this->father_first_name,
            'father Middle name'=>$this->father_middle_name,
            'father last name'=>$this->father_last_name,
            'mother first name'=>$this->mother_first_name,
            'father Middle name'=>$this->mother_middle_name,
            'father last name'=>$this->mother_last_name,
            'official Email'=>$this->official_email,
            'father_contact_email_official'=>$this->father_contact_email_official,
            'division id'=>$this->division_id,
            'grade id'=>$this->grade_id,
            'school id'=>$this->school_id,
            'user id'=>$this->user_id,
            'section id'=>$this->section_id
        ];
    }
}
