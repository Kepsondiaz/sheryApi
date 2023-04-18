<?php

use App\Http\Controllers\Admin\Boutiques\ProduitsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Users\Boutiques\CommandeController;
use App\Http\Controllers\Users\Boutiques\GetProduitsController;
use App\Http\Controllers\Users\Boutiques\PaniersController;
use App\Models\Paniers;
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

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


/*
    route concernant les produits côté admin et utilisateur 
*/
Route::post('/add-produits',[ProduitsController::class, 'addProduits']);
Route::get('/voir-produits',[GetProduitsController::class, 'showProduits']);
Route::get('/voir-produits/{nom}',[GetProduitsController::class, 'showOneProduits']);

/*
    route concernant l'ajout de produit sur le panier 
*/
Route::post('/add-panier', [PaniersController::class, 'addPanier'])->middleware('auth:sanctum');
Route::get('/voir-panier', [PaniersController::class, 'voirPanier'])->middleware('auth:sanctum');

/*
    route concernant les commandes d'un utilisateur 
*/
Route::post('/valider-commandes', [CommandeController::class, 'validerCommandes'])->middleware('auth:sanctum');
// Route::get('/voir-panier', [PaniersController::class, 'voirPanier'])->middleware('auth:sanctum');
