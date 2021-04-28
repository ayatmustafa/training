<?php

namespace Modules\OnlineClasses\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\OnlineClasses\Traits\ZoomJWT;

class OnlineClassResource extends JsonResource
{
    use ZoomJWT;

    private function getZoomOnlineClasses($id) {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }
            return
            [
                "id"         => $data['id'],
                "start_time" => $data['start_time'],
                "start_url"  => substr($data['start_url'], 0, 40),
                "join_url"   => $data['join_url'],
                "password"   => $data['password'],
            ];

    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {


        return [
            "id"                   => $this->id,
            'date'                 => $this->date,
            'class_start_time'     => $this->class_start_time,
            'class_end_time'       => $this->class_end_time,
            'zoom_meeting_id'      => $this->zoom_meeting_id,
            'duration'             => $this->duration,
            "teacher_name"         => $this->user->name,
            'class_name'           => $this->class->name,
            'class_principal_name' => $this->class->user->name,
            'subject'              => $this->subjects->name,
            'students'             => $this->class->students->pluck('user.name'),
            "zoom_onlineClass"     => $this->getZoomOnlineClasses($this->zoom_meeting_id)
        ];
    }
}
