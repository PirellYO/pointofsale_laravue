<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitsTableSeeder extends Seeder
{
    public function run()
    {
        Produit::create([
            'reference' => 'PROD001',
            'code_barre' => '1234567890123',
            'designation' => 'Bouteille',
            'quantite' => 100,
            'prix' => 9000,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD002',
            'code_barre' => '2345678901234',
            'designation' => 'Thermos',
            'quantite' => 59,
            'prix' => 5000,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD003',
            'code_barre' => '3456789012345',
            'designation' => 'Feuille',
            'quantite' => 85,
            'prix' => 3000,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-03-image-card-03.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD004',
            'code_barre' => '3456789012346',
            'designation' => 'Cendrier',
            'quantite' => 15,
            'prix' => 4000,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-03-image-card-04.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD005',
            'code_barre' => '3456789012343',
            'designation' => 'Richoesss',
            'quantite' => 58,
            'prix' => 2000,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-03-image-card-05.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD006',
            'code_barre' => '3456789012343',
            'designation' => 'Gymohhxs',
            'quantite' => 26,
            'prix' => 3000,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-06.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD007',
            'code_barre' => '3456789012383',
            'designation' => 'Lorem',
            'quantite' => 6,
            'prix' => 3500,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-03-image-card-07.jpg',
        ]);

        Produit::create([
            'reference' => 'PROD008',
            'code_barre' => '3456789012843',
            'designation' => 'Tasse',
            'quantite' => 0,
            'prix' => 8700,
            'image' => 'https://tailwindui.com/img/ecommerce-images/category-page-03-image-card-08.jpg',
        ]);
    }
}
