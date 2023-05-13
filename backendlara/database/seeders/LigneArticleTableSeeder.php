<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LigneArticle;
use App\Models\Vente;
use App\Models\Produit;

class LigneArticleTableSeeder extends Seeder
{
    public function run()
    {
        // Récupérer une vente existante
        $vente = Vente::first();

        // Créer des lignes d'articles pour chaque article de la vente
        $articles = [
            ['produit_id' => 1, 'quantite' => 2],
            ['produit_id' => 2, 'quantite' => 3],
            ['produit_id' => 3, 'quantite' => 1],
        ];

        foreach ($articles as $article) {
            // Récupérer le produit correspondant
            $produit = Produit::find($article['produit_id']);

            // Créer une nouvelle ligne d'article
            $ligneArticle = new LigneArticle();
            $ligneArticle->quantite = $article['quantite'];
            $ligneArticle->vente_id = $vente->id;
            $ligneArticle->produit_id = $produit->id;
            $ligneArticle->save();
        }
    }
}

