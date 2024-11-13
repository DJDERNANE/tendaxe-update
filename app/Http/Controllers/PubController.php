<?php

namespace App\Http\Controllers;

use App\Models\Pub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = Pub::all();
        return view('admin.store.pubs', compact('pubs'));
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


    public function filterZone(Request $request)
    {
        $zone = $request->zone;
        if ($zone == 0) {
            return redirect()->route('pubs');
        }
        $pubs = Pub::where('zone', $zone)->get();

        return view('admin.store.pubs', compact('pubs'));
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
        
            if ($request->hasFile('picture')) {
                $imageName = $request->file('picture')->getClientOriginalName();
                $image = $request->file('picture')->storeAs('./Pubs',$imageName,'pictures');
                Pub::create([
                    'zone' => $request->zone,
                    'picture' => $imageName 
                ]);
               
                return redirect()->route('pubs');
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function show(Pub $pub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function edit(Pub $pub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pub $pub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');
        $pubs = Pub::whereIn('id', $ids)->get();

        // Loop through each pub and delete associated pictures
        foreach ($pubs as $pub) {
            $imagePath = 'Pubs/' . $pub->picture;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $pub->delete();
        }
        return response()->json(['message' => 'Successfully deleted pubs and their pictures.']);
    }
}
