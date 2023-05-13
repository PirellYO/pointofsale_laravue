<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $paiements = Paiement::all();
        return response()->json($paiements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // $totalPanier = $request->input('montant_total');

        $paiement = new Paiement();
        $paiement->numero = $this->generateSaleNumber(); // Générer le numéro de vente automatiquement
        $paiement->montant = $request->montant;
        $paiement->moyen_paiement = $request->moyen_paiement;
        $paiement->vente_id = $request->vente_id;
        $paiement->save();

        return response()->json($paiement);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $id)
    {
        //
        $paiement = Paiement::findOrFail($id);
        return response()->json($paiement);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }

    private function generateSaleNumber()
    {
        $prefix = 'PAI0';
        $lastPaie = Paiement::latest()->first();

        if ($lastPaie) {
            $lastNumber = substr($lastPaie->numero, strlen($prefix));
            $newNumber = $prefix . str_pad($lastNumber + 1, strlen($lastNumber), '1', STR_PAD_LEFT);
        } else {
            $newNumber = $prefix . '05';
        }

        return $newNumber;
    }
}
