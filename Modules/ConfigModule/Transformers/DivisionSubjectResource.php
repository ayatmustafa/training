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
            'division_id' =>  $this->division->id,
            "division" =>$this->division->translate(config('app.locale'))['name'] ?? $this->division->translations->first()->name,
            "grades"    => $this->grades->pluck('name'),
            "subjects"  => $this->subjects->pluck('name'),
            "user"      => $this->user->name,
        ];
    }
}
