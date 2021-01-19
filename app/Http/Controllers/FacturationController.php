<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacturationResource;
use App\Http\Resources\LigneDevisResource;
use App\Models\Devis;
use App\Models\Facturation;
use App\Models\LigneDevis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacturationController extends Controller
{
 /**
  * Display a listing of facturation for dashbaord interface.
  *
  * @return \Illuminate\Http\Response
  */
 public function index()
 {
  $data[] = Facturation::where(['is_paid' => 1])->count();
  $data[] = Facturation::where(['is_paid' => 0])->count();
  return response()->json([
   "data" => $data,
  ]);
 }

 public function get($id)
 {
  $ligne = LigneDevis::withTrashed()->where('devis_id', $id)->with('factures')->get();
  return LigneDevisResource::collection($ligne);
 }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function create(Request $request)
 {
  $validator = Validator::make(
   $request->all(),
   [
    'lignes_devis' => 'required',
   ],
   [
    'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
   ]
  )->validate();

    $lastFacturation = Facturation::all()->last();
    $lastFilename = $lastFacturation->filename;

    $expl = explode("-", $lastFilename);
    $explId = explode(".", $expl[3])[0];
    $explYear = (int) $expl[1];

    $date = now();
    $currentYear = $date->year;
    $currentMonth = $date->month;

    $facturation = new Facturation;
    $facturation->is_paid = 0;
    if ($explYear == $currentYear) {
    $facturation->filename = "FA-" . $currentYear . "-" . $currentMonth . "-" . ($explId + 1) . ".pdf";
    } else {
    $facturation->filename = "FA-" . $currentYear . "-" . $currentMonth . "-" . 1 . ".pdf";
    }
    
    $facturation->save();

    $factId = $facturation->id;

  foreach ($validator["lignes_devis"] as $_ligne) {
    $ligneDevis = LigneDevis::find($_ligne);
    $ligneDevis->facturation_id = $factId;
    $ligneDevis->save();
    $delete = LigneDevis::destroy($_ligne) ? "ok" : "nok";
  }

    $infoLigneDevis  = LigneDevis::onlyTrashed()->where('facturation_id', $factId)->get();
    $infoDevis       = Devis::where('id', $infoLigneDevis[0]->devis_id)->first();
    $tva             = $infoDevis->tva;
    $ttc            = 0;
    $tht            = 0;

    foreach($infoLigneDevis as $ligne) {
      $tht += ($ligne->price * $ligne->quantity);
      $ttc += ($ligne->price + $ligne->price * $tva / 100) *  $ligne->quantity;
    }

    $montantTva      = $ttc - $tht;
    $facturationData = Facturation::where('id', $factId)->first();
    $facturationData->tht        = $tht;
    $facturationData->ttc        = $ttc;
    $facturationData->montantTva = $montantTva;
    $facturationData->save();

  return new FacturationResource($facturationData);
 }

 public function createAcompte(Request $request) {
  $validator = Validator::make(
    $request->all(),
    [
     'lignes_devis' => 'required',
    ],
    [
     'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
    ]
   )->validate();

   return $validator;
 }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
 public function store(Request $request)
 {
  //
 }

 /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function show($id)
 {
  //
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function edit($id)
 {
  //
 }

 /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function update(Request $request, $id)
 {
  //
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function destroy($id)
 {
  //
 }
}
