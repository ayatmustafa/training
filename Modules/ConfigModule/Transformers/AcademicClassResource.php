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
        return [
            'id'              => $this->id,
            'division_name'   => $this->division->translate(config('app.locale'))['name'] ?? $this->division->translations->first()->name,
            'grade'           => $this->grade->name,
            'class_name'      => $this->name,
            'class_principal' => $this->user->name,
            // get those data via relationship don't make queries in the resource
            'teachers'        => $this->teachers->pluck('user.name'),
            "subjects"        => $this->division->divisionSubjects->pluck('subject.name'),
            'students'        => $this->students->pluck('user.name')
        ];
    }
}
