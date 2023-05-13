<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_creation',
        'montant_total'
    ];

    public function lignesArticles()
    {
        return $this->hasMany(LigneArticle::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
