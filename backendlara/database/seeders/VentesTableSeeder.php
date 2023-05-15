<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vente;

class VentesTableSeeder extends Seeder
{
    public function run()
    {
        // Seeder pour la vente
        // Vous pouvez décommenter si vous voulez créer des ventes

        
        Vente::create([
            'numero' => 'VNT001',
            'date_creation' => '2022-01-01',
            'montant_total' => 33000,
        ]);

        
    }
}
