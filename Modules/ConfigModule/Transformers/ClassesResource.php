<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\DivisionSubject;

class ClassesResource extends JsonResource
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
            'id'           => $this->id,
            'section_name' => $this->division->Section()->first()->name,
            'division'     => $this->division->logo,
            'grade'        => $this->grade->name,
            'class_name'   => $this->name,
            'name'         => $this->user->name,
        ];
    }
}
