<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Devis;
use App\Models\MyCompany;
use App\Models\LigneDevis;
use App\Models\Facturation;
use App\Models\ClientAddresses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Resources\DevisResource;
use App\Http\Resources\MyCompanyResource;
use App\Http\Resources\LigneDevisResource;
use App\Http\Resources\FacturationResource;


class PdfController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index($id)
    {
        $devis          = LigneDevis::where('devis_id', $id)->get();
        $devisResource  = LigneDevisResource::collection($devis);
        $companyInfo    = MyCompany::where(['id' => 1])->first();
        $company        = new MyCompanyResource($companyInfo);

        $data["email"] = $devisResource[0]->devis->clients->email;
        $infoClient = $devisResource[0]->devis->clients;
        $data["title"] = "Votre de devis";
        $data["auteur"] = "Envoyé depuis devis2facts";
        
        $pdf = PDF::loadView('pdf.devis', compact("devisResource", "company", "infoClient"));

        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "votre_devis.pdf");
        });
       return response()->json("mail envoyé",200);
    }



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
        $devis          = LigneDevis::where('devis_id', $id)->get();
        $devisResource  = LigneDevisResource::collection($devis);
        $companyInfo    = MyCompany::where(['id' => 1])->first();
        $company        = new MyCompanyResource($companyInfo);
        $devisInfo      = Devis::whereId($id)->first();
        $infoClient     = $devisInfo->clients()->first();
        $clientAdresse  = ClientAddresses::where('client_id', $infoClient->id)->first();

        $pdf = PDF::loadView('pdf.devis', compact("devisResource", "company", "infoClient", "clientAdresse"));
        return $pdf->stream();
    }


    /**
     * Generate invoice PDF
     */
    public function generateInvoice($id, $devisId) {                   
        $facturation          = LigneDevis::onlyTrashed()->where('facturation_id', $id)->get();
        $facturationResource  = LigneDevisResource::collection($facturation);
        $companyInfo          = MyCompany::where(['id' => 1])->first();
        $company              = new MyCompanyResource($companyInfo);
        $devisInfo            = Devis::whereId($devisId)->first();
        $infoClient           = $devisInfo->clients()->first();
        $clientAdresse        = ClientAddresses::where('client_id', $infoClient->id)->first();
        $facturation          = Facturation::whereId($id)->first();
        $pdf = PDF::loadView('pdf.facture', compact("facturationResource", "company","infoClient", "clientAdresse", "facturation"));
        return $pdf->stream();
    }


    /**
     * Generate resume for PDF
     */
    public function generateRecapPdf() {

    }
}
