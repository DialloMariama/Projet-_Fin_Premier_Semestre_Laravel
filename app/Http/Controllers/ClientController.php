<?php

namespace App\Http\Controllers;

use App\Models\Itineraire;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){


        $regions = Region::all();
        return view('client.indexClient', compact('regions'));
        
    }
    public function regions($id)
    {
         $itineraires = Itineraire::where('region_id', $id)->get();

         return $itineraires ;

         
    }
    public function enregClient(Request $request){
        $utilisateur1 = Auth::user();

 
        $region = Region::find($request->region);
        $itineraires = Itineraire::find($request->itineraire);

        $utilisateur = User::find($utilisateur1->id);

        $utilisateur->region=$region->nomRegion;
        $utilisateur->itineraire=$itineraires->nomItineraire;
        $utilisateur->tarif=$itineraires->tarif;
        

        $utilisateur->update();
        

        $regions = Region::all();
        return view('client.indexClient', compact('regions'))->with('success','Modification enregistrer avec success');
    }

}
    //

