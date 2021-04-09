<?php

namespace Modules\OnlineClasses\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlineClassResource extends JsonResource
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
            "id"               => $this->id,
            'date'             => $this->date,
            'class_start_time' => $this->class_start_time,
            'class_end_time'   => $this->class_end_time,
            'status'           => $this->status,
            'zoom_meeting_id'  => $this->zoom_meeting_id,
            'duration'         => $this->duration,
            "teacher_name"     => $this->user->name,
            "start_url"        => $this->start_url,
            "join_url"         => $this->join_url,
            "pass_code"        => $this->password
        ];
    }
}
