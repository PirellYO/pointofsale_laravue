<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $sales = Vente::all();
        return response()->json($sales);
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
        // $date = $request->input('date_creation');
        // $date = now();
        $totalPanier = $request->input('montant_total');
        // $moyenPaiement = $request->input('moyenPaiement');

        $vente = new Vente();
        $vente->numero = $this->generateSaleNumber(); // Générer le numéro de vente automatiquement
        $vente->date_creation = now(); // Date de création actuelle
        $vente->montant_total = $totalPanier;
        $vente->save();

        // $vente->produits()->attach($request->produits);

        // foreach ($produits as $produit) {
        //     // Enregistrez les détails des produits vendus, par exemple :
        //     $venteProduit = new Vente();
        //     $venteProduit->vente_id = $vente->id;
        //     $venteProduit->produit_id = $produit['id'];
        //     $venteProduit->quantite = $produit['quantite'];
        //     $venteProduit->save();
        // }

        // foreach ($produits as $produit) {
        //     $vente->produits()->attach($produit['id'], ['quantite' => $produit['quantite']]);
        // }

        return response()->json(['vente' => $vente], 201); 
       }

    /**
     * Display the specified resource.
     */
    public function show(Vente $id)
    {
        //

        $vente = Vente::with('produits')->findOrFail($id);
        return response()->json($vente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }

    /**
     * Generate a unique sale number.
     */
    private function generateSaleNumber()
    {
        $prefix = 'VNT0';
        $lastSale = Vente::latest()->first();

        if ($lastSale) {
            $lastNumber = substr($lastSale->numero, strlen($prefix));
            $newNumber = $prefix . str_pad($lastNumber + 1, strlen($lastNumber), '1', STR_PAD_LEFT);
        } else {
            $newNumber = $prefix . '05';
        }

        return $newNumber;
    }
}
