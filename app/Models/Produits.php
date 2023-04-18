<?php

namespace App\Models;

use App\Models\Commandes;
use App\Models\Images;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit', 
        'descriptions',
        'prix',
        'quantite'
    ];
    public function Images(){
        return $this->hasMany(Images::class, 'produit_id'); 
    }

    public function Commandes(){
        return $this->belongsToMany(Commandes::class); 
    }
    public function User(){
        return $this->belongsToMany(User::class, 'produits_users', 'user_id', 'produit_id')->withPivot('quantite_commande');
    }
}
