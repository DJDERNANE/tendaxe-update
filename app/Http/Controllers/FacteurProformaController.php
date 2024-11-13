<?php

namespace App\Http\Controllers;

use App\Models\FacteurProforma;
use App\Models\FacteurProformaFiles;
use Illuminate\Http\Request;

class FacteurProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facteurs = FacteurProforma::all();
        return view('admin.store.facteurProforma', compact('facteurs'));
       
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
            $facteur = FacteurProforma::create([
                'raison'=>$request->raison,
                'fName'=> $request->nom,
                'lName'=> $request->prenom,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'contry'=> $request->paye,
                'region'=> $request->region,
                'desc'=> $request->besoin,
            ]);
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $imageName = $file->getClientOriginalName();
                    $image = $file->storeAs('./parformaFiles',$imageName,'pictures');
                    FacteurProformaFiles::create([
                        'facteur_proforma_id' => $facteur->id,
                        'path' => $imageName // This will be null if no file was uploaded
                    ]);
                }
            }
            session()->flash('success', 'Votre demande de facture proforma a été envoyée avec succès!');
            return redirect()->back();
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FacteurProforma  $facteurProforma
     * @return \Illuminate\Http\Response
     */
    public function show(FacteurProforma $facteurProforma)
    {
        return view('admin.store.factureDetails', compact('facteurProforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FacteurProforma  $facteurProforma
     * @return \Illuminate\Http\Response
     */
    public function edit(FacteurProforma $facteurProforma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FacteurProforma  $facteurProforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacteurProforma $facteurProforma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FacteurProforma  $facteurProforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacteurProforma $facteurProforma)
    {
        //
    }
}
