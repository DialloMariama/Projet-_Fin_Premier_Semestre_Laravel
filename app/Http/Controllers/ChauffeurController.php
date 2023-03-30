<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Itineraire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChauffeurController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('chauffeur.indexChauffeur', compact('regions'));
    }

    public function regions($id)
    {
         $itineraires = Itineraire::where('region_id', $id)->get();

         return $itineraires ;

         
    }
    public function enregChauffeur(Request $request){

        $utilisateur1 = Auth::user();

 
        $region = Region::find($request->region);
        $itineraires = Itineraire::find($request->itineraire);

        $utilisateur = User::find($utilisateur1->id);

        $utilisateur->region=$region->nomRegion;
        $utilisateur->itineraire=$itineraires->nomItineraire;
        $utilisateur->tarif=$itineraires->tarif;
        

        $utilisateur->update();
        

        $regions = Region::all();
        return view('chauffeur.indexChauffeur', compact('regions'))->with('success','Modification enregistrer avec success');

      
    }
    
    // public  function tarifs ($id){
    //  $tarif =  Itineraire::where('region_id', $id)->get();

    //     return $tarif;
    // }
    
   
    protected function rules()
    {
        return [
            'region' => 'required',
            'itineraire' => 'required',
            'tarif' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'region.required' => 'Veuillez choisir une région',
            'itineraire.required' => 'Veuillez choisir un itinéraire',
            'tarif.required' => 'Veuillez entrer un tarif'
        ];
    }
}

