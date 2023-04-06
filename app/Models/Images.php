<?php

namespace App\Models;

use App\Models\Paniers;
use App\Models\Produits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = [
        'url_images', 
        'produit_id'
    ];
    public function Produits() {
        return $this->belongsTo(Produits::class); 
    }

    public function Panier() {
        return $this->belongsTo(Paniers::class); 
    }
}
