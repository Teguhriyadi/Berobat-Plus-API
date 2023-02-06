<?php

namespace App\Http\Resources\Akun\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class GetCompanyResource extends JsonResource
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
            "id_company" => $this->id_company,
            "nama_company" => $this->nama_company,
            "user_id" => $this->getUser,
            "tempat" => $this->tempat
        ];
    }
}
