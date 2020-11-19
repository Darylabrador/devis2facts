<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientAddressesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $client = new ClientResource($this->clients);
        return [
            'id' => $this->id,
            'address' => $this->address,
            'client' => $client,
            'postcode' => $this->postcode,
            'city' => $this->city,
        ];
    }
}
