<?php

namespace App\Http\Controllers;

use App\Models\Specification;
use App\Models\Domain;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Specification::where('type','doc')->where('status', true)->take(12)->get();
        $veille = Specification::where('type','veille')->where('status', true)->take(12)->get();
        $domains = Domain::take(12)->get();
        return view('documents.index', compact( 'domains', 'docs', 'veille'));
    }


    public function allSpecifications()
    {
        $specifications = Specification::all();
        return view('admin.documents.specifications', compact('specifications'));
    }


    public function veille()
    {
        $docs = Specification::where('type', 'veille')->get();
        return view('documents.domainDocs', compact('docs'));
    }


    public function utils()
    {
        $docs = Specification::where('type', 'doc')->get();
        return view('documents.domainDocs', compact('docs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $imageName = '';
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image')->storeAs('./Specifications',$imageName,'pictures');
            }
                Specification::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imageName,
                    'type' => $request->type,
                    'status' => 1,
                ]);
               
                return redirect()->back()->with('success', 'Cahier de charge created successfully');
           
        } catch (\Throwable $th) {
            return $th;
        }
       
    
        
     
     
    }


    public function newdoc(Request $request)
    {
        try {
            $imageName = '';
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image')->storeAs('./Specifications',$imageName,'pictures');
            }
                Specification::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imageName,
                    'type' => $request->type,
                    'status' => 1,
                ]);
               
                return redirect()->back()->with('success', 'Cahier de charge created successfully');
           
        } catch (\Throwable $th) {
            return $th;
        }
       
    
        
     
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function show(Specification $specification)
    {
        $docs = Specification::take(5)->get();
        return view('documents.showdocument', compact('specification', 'docs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specification $specification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specification $specification)
    {
        //
    }
}
