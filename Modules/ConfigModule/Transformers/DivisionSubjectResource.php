<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

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
            "grades"    => $this->gradeSubjects->first()->grade->pluck('name'),
            "subjects"  => $this->subjects->pluck('name'),
            "user"      => $this->user->name,
        ];
    }
}
