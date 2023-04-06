<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProduitsUsers extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'quantite'
    ];
}
