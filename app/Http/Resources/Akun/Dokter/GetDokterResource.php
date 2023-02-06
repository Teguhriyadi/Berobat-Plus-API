<?php

namespace App\Http\Resources\Akun\Dokter;

use Illuminate\Http\Resources\Json\JsonResource;

class GetDokterResource extends JsonResource
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
            "id_dokter" => $this->id_dokter,
            "jabatan" => $this->jabatan,
            "user_id" => $this->getUser,
            "pendidikan_terakhir" => $this->pendidikan_terakhir,
            "praktik_id" => $this->praktik_di,
            "nomor_str" => $this->nomor_str
        ];
    }
}
