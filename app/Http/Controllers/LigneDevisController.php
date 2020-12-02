<?php

namespace App\Http\Controllers;

use App\Http\Resources\LigneDevisResource;
use App\Models\LigneDevis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LigneDevisController extends Controller
{
    public function create(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => '',
                'devis_id' => 'required|numeric',
                'product_id' => 'required|numeric',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
                'description' => '',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $ligneDevis = LigneDevis::find($validator['id']);

        if (!$ligneDevis) {
            $ligneDevis = new LigneDevis();
        }

        $ligneDevis->devis_id = $validator['devis_id'];
        $ligneDevis->product_id = $validator['product_id'];
        $ligneDevis->quantity = $validator['quantity'];
        $ligneDevis->price = $validator['price'];
        $ligneDevis->description = $validator['description'];
        $ligneDevis->save();

        return new LigneDevisResource($ligneDevis);
    }
}
