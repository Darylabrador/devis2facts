<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LigneDevisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $devis = new DevisResource($this->devis);
        $product = new ProductResource($this->products);
        $facture = new FacturationResource($this->factures);
        return [
            'id'         => $this->id,
            'devis'      => $devis,
            'product'    => $product,
            'facture'    => $facture,
            'description' => $this->description,
            'quantity'    => $this->quantity,
            'price'       => $this->price
        ];
    }
}
