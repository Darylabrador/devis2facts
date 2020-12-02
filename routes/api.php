<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\LigneDevisController;
use App\Http\Controllers\PdfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
Route::middleware('auth:api')->get('/devis/sendemailpdf/{devisId}', [PdfController::class, 'index', 'middleware' => 'WriteToDatabaseMiddleware', 'throttle:500,1' ]);
// Route for dashboard informations
Route::get("/stats", [FacturationController::class, 'index']);

// Route to create Product
Route::post ("products/add", [ProductController::class, 'store']);
Route::get('products/getAll', [ProductController::class, 'index']);
Route::post('products/delete', [ProductController::class, 'destroy']);
Route::post('products/update', [ProductController::class, 'update']);

// Client
Route::post('clients/add', [ClientsController::class, 'add']);
Route::get('clients/getAll', [ClientsController::class, 'getAllClients']);
Route::delete('clients/del/{id}', [ClientsController::class, 'delete']);

// Devis
Route::get('devis/find/ligne/{id}', [DevisController::class, 'findLigne'])->where('id', '[0-9]+');
Route::get('devis/find/{id}', [DevisController::class, 'findDevis'])->where('id', '[0-9]+');
Route::get('devis/clients', [DevisController::class, 'autocomplete']);
Route::get('devis/getAll', [DevisController::class, 'getAll']);
Route::get('devis/lastIdDevis', [DevisController::class, 'lastIdDevis']);
Route::post('devis/add', [DevisController::class, 'add']);
Route::delete('devis/del/{id}', [DevisController::class, 'delete']);

Route::get('devis/up/remise/{id}/{r}', [DevisController::class, 'updateRemise']);
Route::post('devis/update', [DevisController::class, 'update']);


//Ligne devis
Route::post('lignedevis/create', [LigneDevisController::class, 'create']);

// PDF
Route::get('/devis/pdf/{id}', [PdfController::class, "generateDevis"]);
Route::get('/facture/pdf/{id}', [PdfController::class, "generateInvoice"]);
Route::get('/devis/pdf/name/{id}', [PdfController::class, "getFilenameDevis"]);
Route::get('/facture/pdf/name/{id}', [PdfController::class, "getFilenameInvoice"]);
Route::post('/facture/create', [FacturationController::class, "create"]);
Route::get('/facture/get/{id}', [FacturationController::class, "get"])->where('id', '[0-9]+');

//mail with pdf
//Route::get ('/devis/sendemailpdf/{devisId}', [PdfController::class, 'index' ]);

Route::post('/login', [AuthController::class, "login"]);

