<?php

namespace App\Http\Resources\Member\Chating;

use Illuminate\Http\Resources\Json\JsonResource;

class GetChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "dokter" => $this->getDokter->getUser->nama
        ];
    }
}
