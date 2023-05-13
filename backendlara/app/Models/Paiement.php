<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'numero',
        'montant',
        'moyen_paiement',
        'vente_id'
    ];

    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }
}
