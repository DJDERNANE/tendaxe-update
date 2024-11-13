<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Offre;
use App\Models\Secteur;
use App\Models\Product;
use App\Models\Statut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pub;
class SearchOffreController extends Controller
{
    public function index(Request $request)
    {
        // dd(Auth::user()->current_abonnement);
        $expired = true;
        if(Auth::check()){
            if(Auth::user()->type_user === "content"){
                $expired = true;
                $secteurs = Secteur::all();
                $statuts = Statut::all();
            }elseif(Auth::user()->type_user === "Super admin" || Auth::user()->type_user === "admin" || Auth::user()->type_user === "publisher"){
                $expired = false;
                $secteurs = Secteur::all();
                $statuts = Statut::all();
            }else{
                $expired = ((Auth::user()->etat === "desactive") || !(Auth::user()->current_abonnement));
                if($expired || Auth::user()->current_abonnement->nom_abonnement === 'gratuit'){
                    $secteurs = Secteur::all();
                    $statuts = Statut::all();
                }else{
                    $secteurs = Auth::user()->current_abonnement->secteur;
                    $statuts = Auth::user()->current_abonnement->statut;
                }
            }
        }else{
            $secteurs = Secteur::all();
            $statuts = Statut::all();
        }
        
        $user_secteur_ids = [];
        foreach($secteurs as $sec){
            $user_secteur_ids[] = $sec->id;
        } 
        

        if(Auth::check() && Auth::user()->type_user === "publisher"){
            $offres = Auth::user()->offre();
        }else{
            $offres = Offre::where('etat', 'active');
        }

        if($request->has('secteur')){
            for($i=0; $i< count($request->secteur); $i++){
                if(!in_array($request->secteur[$i], $user_secteur_ids)){
                    unset($request->secteur[$i]);
                }
            }
            $user_secteur_ids = $request->secteur;
        }
        
        // if($request->has('statut')){
        //     for($i=0; $i< count($request->statut); $i++){
        //         if(!in_array($request->statut[$i], $user_statut_ids)){
        //             unset($request->statut[$i]);
        //         }
        //     }
        //     $user_statut_ids = $request->secteur;
        // }

        $statutNames = $statuts->pluck('statut')->toArray();
        $length = count($statutNames);
        if($length== 0 ){
             $statuts = Statut::all();
            $statutNames = $statuts->pluck('statut')->toArray();
        }
        
        
        $offres = $offres->whereHas('secteur', function($q) use($user_secteur_ids) {
            $q->whereIn('secteur_id', $user_secteur_ids);
         })->whereIn('statut', $statutNames);
       
    
        
        
        
       //$offres = $offres->whereIn('statut_id', $statuts->pluck('id'));
        
        //  $offres = $offres->whereHas('statut', function($q) use($user_statut_ids) {
        //     $q->whereIn('statut_id', $user_statut_ids);
        // });
        
        
        
        if($request->has('keyword')){
            $offres = $offres->where('titre', 'LIKE', "%{$request->keyword}%");
        }

        if($request->has('annonceur')){
            $offres = $offres->whereHas('adminetab', function($q) use($request) {
                $q->where('nom_etablissement', 'LIKE', "%{$request->annonceur}%");
            });
        }

        if($request->has('wilaya') && $request->wilaya[0]){
            $offres = $offres->whereIn('wilaya', $request->wilaya);
        }

        if($request->has('statut') && $request->statut[0]){
            $offres = $offres->whereIn('statut', $request->statut);
        }

        if($request->has('type') && $request->type){
            $offres = $offres->where('type', $request->type);
        }

        if($request->has('pub') && $request->pub){
            switch($request->pub){
                case 'today': $offres = $offres->whereDate('date_pub', Carbon::today());
                    break;
                case 'week': $offres = $offres->whereBetween('date_pub', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'month': $offres = $offres->whereBetween('date_pub', [Carbon::now()->firstOfMonth(), Carbon::now()->endOfMonth()]);
                    break;
                case '3months': $offres = $offres->whereBetween('date_pub', [Carbon::now()->subMonth(3), Carbon::now()]);
                    break;
                case 'custom': $offres = $offres->whereDate('date_pub', $request->custom_pub);
                    break;
            }
        }

        if($request->has('limit') && $request->limit){
            switch($request->limit){
                case 'today': $offres = $offres->whereDate('date_limit', Carbon::today());
                    break;
                case 'week': $offres = $offres->whereBetween('date_limit', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'month': $offres = $offres->whereBetween('date_limit', [Carbon::now()->firstOfMonth(), Carbon::now()->endOfMonth()]);
                    break;
                case '3months': $offres = $offres->whereBetween('date_limit', [Carbon::now()->subMonth(3), Carbon::now()]);
                    break;
                case 'custom': $offres = $offres->whereDate('date_limit', $request->custom_limit);
                    break;
            }
        }
        
        //$offres = $offres->shuffle();

       $offres = $offres->latest('date_pub')
                 ->orderByRaw('RAND()')
                 ->paginate(15)
                 ->withQueryString();
        
        
       
        
        
        //dd($offres);
        $request->flash();
        $pubs = Pub::where('zone', 1)->get();
        return view('offers.search', [
            'secteurs' => $secteurs,
            'statuts' => $statuts,
            'offres' => $offres,
            'expired' => $expired,
            'pubs' => $pubs,
        ]);
        // $offres = $offres->latest('date_pub')->paginate(15)->withQueryString();
        // $shuffledOffers = $offres->items()->shuffle(); // Shuffle the items while preserving pagination
        // $offres->setCollection($shuffledOffers); // Update the collection with shuffled items
        
        // // Other code remains the same...
        // $request->flash();
        
        // return view('offers.search', [
        //     'secteurs' => $secteurs,
        //     'offres' => $offres,
        //     'expired' => $expired,
        // ]);
    }
    public function detail(Request $request, $offre_id)
    {
        // get offre infos 
        if(Auth::check() && Auth::user()->type_user === "admin"){
            $offre = Offre::withTrashed()->where('id', $offre_id)->with('secteur','user')->first();
        }else{
            $offre = Offre::where('id', $offre_id)->with('secteur','user')->first();
        }

        if($offre->etat === "desactive"){
            if(Auth::check() && Auth::id() != $offre->user_id){
                return abort(404);
            }
        }

        $img = null;
        $etab = $offre->adminetab;


        if( $offre->adminetab->category === "AUTRE"){
            $img = $offre->adminetab->logo;
        }else{
            $img = "default";
        }


        // dd($offre->journalar);

        $expired = $this->Expired($offre);

        $products = Product::orderBy('valeur')->take(12)->get();
        
        return view('offers.detail',[
            'expired' => $expired,
            'offre' => $offre,
            'img' => $img,
            'etab' => $etab,
            'journal_ar' => $offre->journalar,
            'journal_fr' => $offre->journalfr,
            'products' => $products,
        ]);
    }

    private function Expired(Offre $offre = null)
    {
        $expired = true;

        //check if admin
        if(Auth::check() && Auth::user()->type_user === 'admin'){
            return false;
        }

        // check if content creator & owner
        if(Auth::check() && (Auth::user()->type_user === 'content' || Auth::user()->type_user === 'publisher')){
            return $offre->user_id != Auth::id();
        }

        // check if account suspended
        if(Auth::check() && Auth::user()->etat === 'desactive'){
            return true;
        }

        // check expiration date
        if(Auth::check() && Auth::user()->type_user === 'abonné'){
            
            if($offre && $offre->user_id == Auth::id()){
                return false;
            }

            $current = Auth::user()->current_abonnement;

            if($current){
                if($current->nom_abonnement === "gratuit"){
                    return false;
                }

                if($offre){

                    // get current use secteurs
                    $user_sec = [];
                    foreach($current->secteur as $sec){
                        $user_sec[] = $sec->id;
                    }

                    // get offre sectors
                    $offre_sec = [];
                    foreach($offre->secteur as $sec){
                        $offre_sec[] = $sec->id;
                    }

                    // check if he can see or not
                    return count(array_intersect($user_sec,$offre_sec)) <= 0;

                }

            }else{
                return false;
            }            
        }

        return $expired;
    }
}
