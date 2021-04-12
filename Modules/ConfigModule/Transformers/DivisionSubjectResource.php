<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\ConfigModule\Entities\Grade;

class DivisionSubjectResource extends JsonResource
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
            "id"        => $this->id,
            "divisions" => $this->division->logo,
            "grades"    => $this->gradeSubjects->has('grade'),
            "subjects"  => $this->subjects->pluck('name'),
            "user"      => $this->user->name,
        ];
    }
}
