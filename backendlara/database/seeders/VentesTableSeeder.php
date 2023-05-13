<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vente;

class VentesTableSeeder extends Seeder
{
    public function run()
    {
        Vente::create([
            'numero' => 'VNT001',
            'date_creation' => '2022-01-01',
            'montant_total' => 10000.00,
        ]);

        Vente::create([
            'numero' => 'VNT002',
            'date_creation' => '2022-02-15',
            'montant_total' => 139700.00,
        ]);

        
    }
}
