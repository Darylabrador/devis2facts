<?php

namespace App\Http\Controllers;

use App\Http\Resources\DevisResource;
use App\Models\Devis;

class DevisController extends Controller
{
    public function get()
    {
        $devis = Devis::get();
        return DevisResource::collection($devis);
    }
}
