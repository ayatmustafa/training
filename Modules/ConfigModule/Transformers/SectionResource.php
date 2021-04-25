<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            "id"          => $this->id,
            'division_id' => $this->division->id,
            "section"     => $this->translate(config('app.locale'))['name'] ?? $this->translations->first()->name,
            "status"      => $this->status,    
        ];
    }
}
