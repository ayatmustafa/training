<?php

namespace Modules\ConfigModule\Transformers;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\ConfigModule\Entities\Subject;
use Modules\ConfigModule\Entities\Teacher;

//class name should be ClassResource you should choose your names carefully
class AcademicClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
    $teachers = Teacher::whereIn('id',$this->TeacherClasses->pluck('teacher_id'))->pluck('user_id');
        return [
            'id'           => $this->id,
            'section_name' => $this->division->Section()->first()->name,
            'division'     => $this->division->logo,
            'grade'        => $this->grade->name,
            'class_name'   => $this->name,
            'name'         => $this->user->name,
            // get those data via relationship don't make queries in the resource
            'teachers'     => User::whereIn('id', $teachers)->pluck('name'),
            "subjects"     => Subject::whereIn('id', $this->division->divisionSubjects->pluck('subject_id'))->pluck('name'),
            'students'     => User::whereIn('id', $this->students->pluck('user_id'))->pluck('name')
        ];
    }
}
