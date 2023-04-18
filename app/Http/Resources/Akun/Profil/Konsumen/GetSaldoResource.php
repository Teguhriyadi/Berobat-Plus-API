<?php

namespace App\Http\Resources\Akun\Profil\Konsumen;

use Illuminate\Http\Resources\Json\JsonResource;

class GetSaldoResource extends JsonResource
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
            "saldo" => $this->saldo,
            "bank_code" => $this->bank_code
        ];
    }
}
