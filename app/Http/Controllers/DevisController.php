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
                //'is_accepted' => 'required' // -> false
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
        $devis->tht = 0;
        $devis->ttc = 0;
        $devis->montantTva = 0;
        $devis->remise = $validator['remise'];
        $devis->date_expiration = $validator['date_expiration'];
        
        $devis->is_accepted = 0;

        //$devis->save();

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

    public function update(Request $request,  Devis $devis)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'            => 'required|exists:App\Models\Devis,id',
                'client_id' => 'required',
                'tva' => 'required',
                'tht' => 'required',
                'ttc' => 'required',
                'montantTva' => 'required',

                'remise' => 'required',
                'is_accepted' => 'required',
                'date_expiration' =>'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'      => true,
                'errorList'  => $validator->errors()
            ], 422);
        }

        $devis = Devis::find($request->id);

        $devis->client_id =  $request->client_id;
        $devis->tva =  $request->tva;
        $devis->remise =  $request->remise;
        $devis->tht =  $request->tht;
        $devis->ttc =  $request->ttc;
        $devis->montantTva =  $request->montantTva;
        $devis->is_accepted =  $request->is_accepted;
        $devis->date_expiration =  $request->date_expiration;



        $verify = $devis->save();

        if ($verify) {
            return response()->json([
                'error'  => false,
                'message'   => "le produit est modifié",
                'product' => New DevisResource($devis)
            ], 200);
        } else {
            return response()->json([
                'error'  => true,
                'errorList'   => 'un problème est survenu dans la modification',
            ], 422);
        }
    }

    

}
