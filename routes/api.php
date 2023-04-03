<?php

use App\Http\Controllers\Admin\Boutiques\ProduitsController;
use App\Http\Controllers\Users\Boutiques\GetProduitsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// route concernant les actions faites par les administrateurs
Route::post('/add-produits',[ProduitsController::class, 'addProduits']);


// route concernant les actions faites par les utilisateurs
Route::get('/voir-produits',[GetProduitsController::class, 'showProduits']);
Route::get('/voir-produits/{id}',[GetProduitsController::class, 'showOneProduits']);
