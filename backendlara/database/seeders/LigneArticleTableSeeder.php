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
        $vente = Vente::first();

        $articles = [
            ['produit_id' => 1, 'quantite' => 2],
            ['produit_id' => 2, 'quantite' => 3],
        ];

        foreach ($articles as $article) {

            $produit = Produit::find($article['produit_id']);

            $ligneArticle = new LigneArticle();
            $ligneArticle->quantite = $article['quantite'];
            $ligneArticle->vente_id = $vente->id;
            $ligneArticle->produit_id = $produit->id;
            $ligneArticle->save();
        }
    }
}

