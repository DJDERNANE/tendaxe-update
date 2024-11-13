<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners= Partner::all();
        return view('admin.store.partners', compact('partners'));
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
        try {
        
            if ($request->hasFile('picture')) {
              
                $imageName = $request->file('picture')->getClientOriginalName();
                $image = $request->file('picture')->storeAs('./Partners',$imageName,'pictures');
                Partner::create([
                    'name' => $request->name,
                    'picture' => $imageName // This will be null if no file was uploaded
                ]);
               
                return redirect()->route('partners')->with('success', 'partner added successfully!');
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.store.editpartner', compact('partner')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        try {
            // Initialize the icon and picture names
            $imageName = $partner->picture;
    
            // Handle picture upload
            if ($request->hasFile('picture')) {
                // Delete the old picture if it exists
                if ($partner->picture) {
                    Storage::disk('pictures')->delete('Partners/' . $partner->picture);
                }
    
                $imageName = $request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs('Partners', $imageName, 'pictures');
            }
    
    
            $partner->update([
                'name' => $request->name,
                'picture' => $imageName,
            ]);
    
            return redirect()->route('partners')->with('success', 'partner updated successfully!');
        } catch (\Throwable $th) {
            // Log the error
            \Log::error('Error updating partner: ' . $th->getMessage());
    
            return redirect()->back()->with('error', 'An error occurred while updating the partner. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');
        $partners = Partner::whereIn('id', $ids)->get();

        // Loop through each partner and delete associated pictures
        foreach ($partners as $partner) {
            $imagePath = 'Partners/' . $partner->picture;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $partner->delete();
        }
        return response()->json(['message' => 'Successfully deleted categories and their pictures.']);
    }
}
