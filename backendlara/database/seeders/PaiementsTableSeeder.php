<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paiement;

class PaiementsTableSeeder extends Seeder
{
    public function run()
    {
        Paiement::create([
            'numero' => 'PAI001',
            'moyen_paiement' => 'CHEQUE',
            'montant' => 100.00,
            'vente_id' => 1,
        ]);

        Paiement::create([
            'numero' => 'PAI002',
            'moyen_paiement' => 'ESPECE',
            'montant' => 200.00,
            'vente_id' => 1,
        ]);

        Paiement::create([
            'numero' => 'PAI003',
            'moyen_paiement' => 'CARTE BANCAIRE',
            'montant' => 300.00,
            'vente_id' => 2,
        ]);

        Paiement::create([
            'numero' => 'PAI004',
            'moyen_paiement' => 'ESPECE',
            'montant' => 400.00,
            'vente_id' => 2,
        ]);

        Paiement::create([
            'numero' => 'PAI005',
            'moyen_paiement' => 'CARTE BANCAIRE',
            'montant' => 500.00,
            'vente_id' => 2,
        ]);
    }
}
