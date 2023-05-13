<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = Produit::all();
        return response()->json($produits);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $id)
    {
        //
        $produit = Produit::findOrFail($id);
        return response()->json($produit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //

        $quantiteVendue = $request->input('quantiteVendue');

        if ($quantiteVendue > $produit->quantite) {
            return response()->json(['message' => 'La quantité vendue dépasse la quantité disponible'], 400);
        }

        $produit->quantite -= $quantiteVendue;
        $produit->save();

        return response()->json(['message' => 'Quantité du produit mise à jour avec succès']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
