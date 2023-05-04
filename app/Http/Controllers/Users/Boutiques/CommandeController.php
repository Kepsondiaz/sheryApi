<?php

namespace App\Http\Controllers\Users\Boutiques;

use App\Http\Controllers\Controller;
use App\Models\Commandes;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * fonction qui permet valider la commande d'un  utilisateur connecter
     */
    
    public function validerCommandes(Request $request)
    {
        return "vôtre commande est valide en attente de paiement";
    }
}
