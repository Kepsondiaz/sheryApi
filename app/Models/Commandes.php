<?php

namespace App\Models;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;
    public function Produits(){
        return $this->belongsToMany(Produits::class); 
    }
}
