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
            'name'=>$this->name,
            'division' =>$this->division->id." -" . $this->division->logo
            ];
    }
}
