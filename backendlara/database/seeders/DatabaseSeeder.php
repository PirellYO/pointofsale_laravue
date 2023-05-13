<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LigneArticle;
use Illuminate\Database\Seeder;
// use LigneArticleTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Produit::factory()->create();
        // \App\Models\Vente::factory()->create();
        // \App\Models\Paiement::factory()->create();
        // \App\Models\LigneArticle::factory()->create();

        $this->call([
            ProduitsTableSeeder::class,
            VentesTableSeeder::class,
            PaiementsTableSeeder::class,
            LigneArticleTableSeeder::class,
        ]);
    }
}
