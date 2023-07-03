<?php

namespace App\Http\Resources\Akun\Perawat;

use Illuminate\Http\Resources\Json\JsonResource;

class GetPerawatResource extends JsonResource
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
            "id_perawat" => $this->id_perawat,
            "nomor_strp" => $this->nomor_strp,
            "user" => $this->getUser,
            "file_dokumen" => $this->file_dokumen
        ];
    }
}
