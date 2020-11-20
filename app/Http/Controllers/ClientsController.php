<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    public function add(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100',
                'email' => 'required|email',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $client = new Client();
        $client->name = $validator['name'];
        $client->email = $validator['email'];
        $client->save();

        return new ClientResource($client);


    }

    public function getAllClients () {
        $clients = Client::all();
        return ClientResource::collection($clients);
    }

    public function delete (Client $client) {
        $client->delete();
    }
    
}
