<?php

namespace App\Http\Controllers;

use App\Http\Resources\DevisResource;
use App\Http\Resources\FacturationResource;
use App\Http\Resources\LigneDevisResource;
use App\Models\Client;
use App\Models\ClientAddresses;
use App\Models\Devis;
use App\Models\Facturation;
use App\Models\LigneDevis;
use App\Models\MyCompany;
use App\Models\Product;
use Illuminate\Http\Request;

use PDF;

class PdfController extends Controller
{
    /**
     * Get filename for devis PDF
     */
    public function getFilenameDevis($id)
    {
        $devis = Devis::whereId($id)->first();
        return new DevisResource($devis);
    }


    /**
     * Get filename for invoice PDF
     */
    public function getFilenameInvoice($id)
    {
        $facture = Facturation::whereId($id)->first();
        return new FacturationResource($facture);
    }


    /**
     * Generate devis PDF
     */
    public function generateDevis($id) {
        $devis     = LigneDevis::where('devis_id', $id)->get();
        $ressource = LigneDevisResource::collection($devis);
        $pdf = PDF::loadView('pdf.devis', compact("ressource"));
        return $pdf->stream();
    }

    /**
     * Generate invoice PDF
     */
    public function generateInvoice($id) {
        $data = [
            'title' => 'My first PDF test',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('pdf.devis', $data);
        return $pdf->stream();
    }


    /**
     * Generate resume for PDF
     */
    public function generateRecapPdf() {

    }
}
