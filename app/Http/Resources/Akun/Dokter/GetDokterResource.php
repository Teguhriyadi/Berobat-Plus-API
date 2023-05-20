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
            "user_id" => $this->getUser,
            "nomor_str" => $this->nomor_str,
            "kelas" => $this->kelas,
            "biaya" => $this->getBiaya,
            "harga" => "Rp. " . number_format($this->biaya)
        ];
    }
}
