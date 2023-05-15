<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $sales = Vente::orderByDesc('numero', 'date_creation')
        ->join('ligne_articles', 'ventes.id', '=', 'ligne_articles.vente_id')
        ->join('produits', 'ligne_articles.produit_id', '=', 'produits.id')
        ->select('ventes.id', 'ventes.numero', 'ventes.date_creation', 'ventes.montant_total', DB::raw('GROUP_CONCAT(produits.designation, " (", ligne_articles.quantite, ")") as produits_quantite'))
        ->groupBy('ventes.id')
        ->orderByDesc('date_creation')
        ->get();

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
        $totalPanier = $request->input('montant_total');

        $vente = new Vente();
        $vente->numero = $this->generateSaleNumber();
        $vente->date_creation = now(); 
        $vente->montant_total = $totalPanier;
        $vente->save();


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
