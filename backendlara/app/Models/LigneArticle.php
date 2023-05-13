<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        // 'montant',
        'produit_id',
        'vente_id'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }
}
