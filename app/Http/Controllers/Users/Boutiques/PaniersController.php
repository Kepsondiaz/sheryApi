<?php

namespace App\Http\Controllers\Users\Boutiques;

use App\Http\Controllers\Controller;
use App\Models\Produits;
use App\Models\ProduitsUsers;
use App\Models\User;
use Illuminate\Http\Request;

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
           return response()->json(['message' => 'Cette quantite est supérieure à la quantité totale du produit']);
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

        if (count($panier_content)==0)
        {
            return response()->json(['message' => "vôtre panier est vide"], 200); 
        }
        
        $array_produits = array();
        foreach($panier_content as $panier)
        {
            $produits = Produits::with('images')->where('id', $panier->pivot->produit_id)->get();
             array_push($array_produits, $produits);
        }

        return response()->json(['message' => $array_produits], 200);
    }

    /**
     * fonction pour valider le panier
     */
    public function validerPanier()
    {
        
    }
}   
