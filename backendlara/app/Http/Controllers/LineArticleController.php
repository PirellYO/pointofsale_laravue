<?php

namespace App\Http\Controllers;

use App\Models\LigneArticle;
use Illuminate\Http\Request;

class LineArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ligneArticles = LigneArticle::all();
        return response()->json($ligneArticles);
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
        $venteId = $request->input('vente_id');
        $produitId = $request->input('produit_id');
        $quantite = $request->input('quantite');

        $ligneArticle = new LigneArticle();
        $ligneArticle->vente_id = $venteId;
        $ligneArticle->produit_id = $produitId;
        $ligneArticle->quantite = $quantite;
        $ligneArticle->save();

        return response()->json(['message' => 'Ligne d\'article enregistrée avec succès']);
    }

    /**
     * Display the specified resource.
     */
    public function show(LigneArticle $ligneArticle)
    {
        //
        return response()->json($ligneArticle);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LigneArticle $ligneArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LigneArticle $ligneArticle)
    {
        //
        $quantite = $request->input('quantite');

        $ligneArticle->quantite = $quantite;
        $ligneArticle->save();

        return response()->json(['message' => 'Ligne d\'article mise à jour avec succès']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LigneArticle $ligneArticle)
    {
        //
        $ligneArticle->delete();

        return response()->json(['message' => 'Ligne d\'article supprimée avec succès']);
    }
}
