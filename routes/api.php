<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\DevisController;
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

// Route for dashboard informations
Route::get("/stats", [FacturationController::class, 'index']);

//Route to create Product
Route::post ("products/add", [ProductController::class, 'store']);
Route::get('products/getAll', [ProductController::class, 'index']);
Route::post('products/delete', [ProductController::class, 'destroy']);
Route::post('products/update', [ProductController::class, 'update']);

//Client
Route::post('clients/add', [ClientsController::class, 'add']);
Route::get('clients/getAll', [ClientsController::class, 'getAllClients']);
Route::post('/clients/del/{client}', [ClientsController::class, 'delete']);

// Devis 
Route::get('devis/get', [DevisController::class, 'get']);
