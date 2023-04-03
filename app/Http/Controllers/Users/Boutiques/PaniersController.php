<?php

namespace App\Http\Controllers\Users\Boutiques;

use App\Http\Controllers\Controller;
use App\Models\Paniers;
use App\Models\Produits;
use Illuminate\Http\Request;

class PaniersController extends Controller
{
    public function addPanier(Request $request)
    {
        $panier = Paniers::create([
           'id_produit' => $request->id 
        ]);
    }
    
    public function voirPanier($id)
    {
        $produits = Produits::with('images')->where('id', $id)->firstOrFail();
        
        if(!$produits){
            return response()->json(['message' => "erreur"], 403); 
        }
        return response()->json(['message' => $produits], 200);
    }
}
