<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
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
            'id'          => $this->id,
            'user_id'     => $this->user_id,
            'PRINCIPAL'   => $this->user->name,
            'long_name'   => $this->long_name,
            'short_name'  => $this->short_name,
            'branch_name' => $this->branch_name,
            'contacts'    => $this->contacts,
            'school_divisions' => $this->divisions->pluck('name'),
            "lang"        => $this->translate(config('app.locale')), 
        ];
    }
}
