<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            'role' => $this->roles->first()->name,
            "token"=>$this->token , 
            'expires_at' => Carbon::parse($this->expires_at)->toDateTimeString()
        ];
    }
}
