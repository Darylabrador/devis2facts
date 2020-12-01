<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\DevisResource;
use App\Http\Resources\LigneDevisResource;
use App\Models\Client;
use App\Models\Devis;
use App\Models\LigneDevis;

class DevisController extends Controller
{

    public function add(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'client_id' => 'required',
                'filename' => 'required|max:50',
                'tva' => 'required',
                'remise' => 'required',
                //'isAccepted' => 'required' // -> false
                'date_expiration' =>'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $devis = new Devis();

        $devis->client_id = $validator['client_id'];
        $devis->filename = $validator['filename'];
        $devis->tva = $validator['tva'];
        $devis->remise = $validator['remise'];
        $devis->date_expiration = $validator['date_expiration'];
        
        $devis->is_accepted = 0;

        $devis->save();

        return new DevisResource($devis);

    }


    public function findLigne($id)
    {
        $lignedevis = LigneDevis::where('devis_id', $id)->get();
        return LigneDevisResource::collection($lignedevis);
    }

    public function lastIdDevis() {
        $lastdevis = Devis::latest('id')->first();
        return new DevisResource($lastdevis);
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

    public function updateRemise ($id,$r) {

        //Devis::destroy($id);
        //return response()->json(["id" => $id]);

        Devis::where('id', $id)->update(['remise' => $r]);

    }

    

}
