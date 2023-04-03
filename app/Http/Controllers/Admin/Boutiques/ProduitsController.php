<?php

namespace App\Http\Controllers\Admin\Boutiques;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
        //controller pour toutes les fonctionnalité concernant les produits de la boutique cote admin

        public function addProduits (Request $request) {

            // validateur de données
            $valideAttr = $request->validate([
                'nom_produit' => 'required|String',
                'descriptions' => 'required',
                'prix' => 'required|integer',
                'quantite' => 'required|integer',
                'url_images' => 'required'
            ]);
            
            //ajout des informations par rapport au produit 
            $produits = Produits::create([
                'nom_produit' => $valideAttr['nom_produit'],
                'descriptions' => $valideAttr['descriptions'],
                'prix' => $valideAttr['prix'],
                'quantite' => $valideAttr['quantite'],
            ]);
            
            // if (request()->hasFile('fichier')) {
            //     $extenFileUpload = $request->fichier->getClientOriginalExtension();
            //     $nameFileUpload = $request->fichier->getClientOriginalName();

            //     try {
            //         $files = $request->file('url_images');
            //         foreach($files as $image) {
            //             $extenFileUpload = $image->getClientOriginalExtension();
            //             $nameFileUpload = $image->getClientOriginalName();
            //             $urlFile = $nameFileUpload;
            //             $image->move('Images', $urlFile);
            //             }
                        $images = Images::create([
                            'url_images' => $valideAttr['url_images'],
                            'produit_id' => $produits->id
                        ]);
            // }
            // catch(\Exception $exception) {
            //     return response()->json(['message' => "oup's ceci est une erreur"], 200);
            // }

            return response()->json(['message' => $produits], 200);
        }

        public function updateProduits(Request $request, $id)
        {
            $valideAttr = $request->validate([
                'nom_produit' => 'required|String',
                'descriptions' => 'required',
                'prix' => 'required|integer',
                'quantite' => 'required|integer',
                'url_images' => 'required'
            ]);

            
        }
}
