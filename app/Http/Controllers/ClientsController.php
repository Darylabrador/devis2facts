<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function add(Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'clientaddress_id' => 'required',
                'postcode' => 'required',
                'city' => 'required',
                'email' => 'required'
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        return $validator;
    }
}
