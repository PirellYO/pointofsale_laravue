<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'code_barre',
        'designation',
        'quantite',
        'prix',
        'image'
    ];

    public function lignesArticles()
    {
        return $this->hasMany(LigneArticle::class);
    }
}
