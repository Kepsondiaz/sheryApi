<?php

namespace App\Http\Controllers\Users\Boutiques;

use App\Http\Controllers\Controller;
use App\Models\Paniers;
use App\Models\Produits;
use App\Models\ProduitsUsers;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaniersController extends Controller
{
    /*
        fonction qui permet à un utilisateur d'ajouter un produit sur son panier
    */
    public function addPanier(Request $request)
    {
        $user = auth()->user()->id;
        $users = User::where('id', $user)->firstOrFail();
        
        $produits = Produits::with('images')->where('id', 1)->firstOrFail();
        
        // dd($users);
        $quantite = $request->input('quantite');
        if($quantite < $produits->quantite)
        {
           $panier = $users->produits()->attach($produits->id, ["quantite_commande" => $quantite]);
            
            return response()->json(['message' => 'produit aujouté'], 200);
        }
        else{
           return response()->json(['message' => 'Cette quantite n\'existe pas']);
        }
        
    }
    
    
    /*
        fonction qui permet à un utilisateur de voir son panier
    */
    public function voirPanier()
    {
        $user = auth()->user()->id;
        
        $panier_user = User::where('id', $user)->firstOrFail();
        $panier_content = $panier_user->produits->all();

        if(!$panier_content){
            return response()->json(['message' => "erreur"], 403); 
        }
        return response()->json(['message' => $panier_content], 200);
    }
}   
