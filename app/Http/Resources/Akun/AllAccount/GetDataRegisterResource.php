<?php

namespace App\Http\Resources\Akun\AllAccount;

use Illuminate\Http\Resources\Json\JsonResource;

class GetDataRegisterResource extends JsonResource
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
            "id" => $this->id,
            "nama" => $this->nama,
            "nomor_hp" => $this->nomor_hp,
            "alamat" => $this->alamat,
            "role" => $this->getRole->only("id_role", "nama_role"),
            "foto" => $this->foto
        ];
    }
}
