<?php

namespace App\Http\Controllers;

use App\Models\GroupParticipant;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  activeGroups()
    {
       // Get offers with more than one participant
       $offres = Offre::where('groupStatus' , true)->paginate(15);
       return view('admin.offersGroup', compact('offres'));
    }


    public function index()
    {
       // Get offers with more than one participant
       $offres = Offre::whereHas('participations')->where('groupStatus' , false)->paginate(15);
       return view('admin.offersGroup', compact('offres'));
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
    public function store(Offre $offre)
    {
        GroupParticipant::create([
            "user_id" => Auth::id(),
            "offre_id" => $offre->id 
        ]);

        return redirect()->back()->with('message', 'Vous avez participé dans un groupe, nous vous contacterons pour confirmer. Merci.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupParticipant  $groupParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        $users = $offre->participations->map(function($participation) {
            return $participation->user;
        });
      
        return view('admin.offerGroupMembers', compact('users', 'offre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupParticipant  $groupParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupParticipant $groupParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupParticipant  $groupParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Offre $offre)
    {
        $offre->groupStatus = true;
        $offre->save();
        return redirect()->route('admin.offregroups');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupParticipant  $groupParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupParticipant $groupParticipant)
    {
        //
    }
}
