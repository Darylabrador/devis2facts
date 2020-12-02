<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\ClientAddresses;
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
                'address' => 'required',
                'postcode' => 'required|numeric',
                'city' => 'required',
                'id' => '',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $client = Client::find($validator['id']);
        if ($client) {

        } else if (!$client) {
            $client = new Client();
        }
        $client->name = $validator['name'];
        $client->email = $validator['email'];
        $client->save();

        $address = new ClientAddresses;
        $address->address = $validator['address'];
        $address->postcode = $validator['postcode'];
        $address->city = $validator['city'];
        $address->client_id = $client->id;
        $address->save();
        
        return new ClientResource($client);

    }

    public function getAllClients()
    {
        $clients = Client::all();
        return ClientResource::collection($clients);
    }

    public function delete ($id) {

        Client::destroy($id);
        return response()->json(["id" => $id]);

    }

}
