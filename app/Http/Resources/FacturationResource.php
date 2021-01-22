<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacturationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'is_paid'    => $this->is_paid,
            'filename'   => $this->filename,
            'montantTva' => $this->montantTva,
            'tht'        => $this->tht,
            'ttc'        => $this->ttc,
            // 'devis'      => ''
        ];
    }
}
