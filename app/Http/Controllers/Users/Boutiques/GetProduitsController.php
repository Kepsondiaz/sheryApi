<?php

namespace App\Http\Controllers\Users\Boutiques;

use App\Http\Controllers\Controller;
use App\Models\Produits;
use Illuminate\Http\Request;

class GetProduitsController extends Controller
{
    /*
        function pour récuperer tout les produits
    */
    public function showProduits()
    {
        $produits = Produits::with('images')->get();
        
        if(!$produits){
            return response()->json(['message' => "erreur"], 403); 
        }
        return response()->json(['message' => $produits], 200);
    }
    
    /*
        fonction pour voir un unique produit
    */
    public function showOneProduits($slug)
    {
        $produits = Produits::with('images')->where('nom_produit', $slug)->firstOrFail();
        
        if(!$produits){
            return response()->json(['message' => "erreur"], 403); 
        }
        return response()->json(['message' => $produits], 200);
    }

    
    
} 
