<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
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
            'id'=>$this->id,
            'Name of Grade'=>$this->name,
            ];
    }
}
