<?php

namespace App\Http\Controllers;

use App\Http\Resources\DevisResource;
use App\Http\Resources\LigneDevisResource;
use App\Models\Client;
use App\Models\Devis;
use App\Models\LigneDevis;

class DevisController extends Controller
{
    public function findLigne($id)
    {
        $lignedevis = LigneDevis::where('devis_id', $id)->get();
        return LigneDevisResource::collection($lignedevis);
    }
    public function findDevis($id) {
        $devis = Devis::find($id);
        return new DevisResource($devis);
    }

    public function autocomplete() {
        $clients = Client::get();
        return $clients;
    }

    public function getAll() {
        $devis = Devis::all();
        return DevisResource::collection($devis);
    }

    public function delete ($id) {

        Devis::destroy($id);
        return response()->json(["id" => $id]);

    }

}
