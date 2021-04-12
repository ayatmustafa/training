<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DivisionSubjectResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
