<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DevisResource extends JsonResource
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
            'client' => $client,
            'filename' => $this->filename,
            'tva' => $this->tva,
            'creation' => $this->date_creation,
            'expiration' => $this->date_expiration,
            'is_accepted' => $this->is_accepted
        ];
    }
}
