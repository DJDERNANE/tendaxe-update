<?php

namespace App\Http\Controllers;

use App\Models\abonnementBoutique;
use Illuminate\Http\Request;

class AbonnementBoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $abnm = abonnementBoutique::create([
            'store_id' => $request->store_id,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'points'=>$request->points,
            'nom_abonnement'=>$request->abnm,
            'users'=>$request->users,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\abonnementBoutique  $abonnementBoutique
     * @return \Illuminate\Http\Response
     */
    public function show(abonnementBoutique $abonnementBoutique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\abonnementBoutique  $abonnementBoutique
     * @return \Illuminate\Http\Response
     */
    public function edit(abonnementBoutique $abonnementBoutique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\abonnementBoutique  $abonnementBoutique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, abonnementBoutique $abonnementBoutique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\abonnementBoutique  $abonnementBoutique
     * @return \Illuminate\Http\Response
     */
    public function destroy(abonnementBoutique $abonnementBoutique)
    {
        //
    }
}
