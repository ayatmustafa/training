<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class DivisionResource extends JsonResource
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
            'logo'             => $this->logo,
            // enhancement this is a wrong key name it should be school_id
            'school'           => $this->school_id,
            // enhancement this is a wrong key name it should be name only
            'Name of Division' => $this->name,

        ];
    }
}
