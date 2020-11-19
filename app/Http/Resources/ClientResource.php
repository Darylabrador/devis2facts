<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $clientaddress = new ClientAddressesResource($this->clientaddresses);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'clientaddress' => $clientaddress,
            'postcode' => $this->token,
        ];
    }
}
