<?php

namespace App\Http\Controllers;

use App\Models\Itineraire;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $regions = Region::all();
        $itineraires = Itineraire::all();

        return view('admin.index',compact('regions','itineraires'));
        Auth::logout();
    }
    public function listeClient(){
        $clients = User::where('role', 'client')->get();
        return view('client.listeClient', compact('clients'));
    }
    
    public function listeChauffeur(){
        $chauffeurs = User::where('role', 'chauffeur')->get();
        return view('chauffeur.listeChauffeur', compact('chauffeurs'));
    }
    public function store(Request $request)
    {

        $region = new Region();
        $region->nomRegion = $request->region;

        $region->save();

        return redirect()->route('admin.index')->with('success','Région Enregistrer avec success');
    }
    
    public function store2(Request $request)
    {

        $itineraire = new Itineraire();
        $itineraire->nomItineraire = $request->itineraire;
        $itineraire->region_id = $request->input('region');
        $itineraire->tarif = $request->tarif;

        $itineraire->save();

        return redirect()->route('admin.index')->with('success','Enregistrement fait avec success');
    }
    public function modifier($id)
    {
        $regions = Region::all();
        $itineraire=Itineraire::find($id);
        return view('admin.modifier',compact('itineraire','regions'));
    }
    public function update(Request $request, $id)
    {
        $request->validate($this->rules(), $this->messages());

        $itineraire = Itineraire::find($id);
        $itineraire->nomItineraire = $request->itineraire;
        $itineraire->region_id = $request->input('region');
        $itineraire->tarif = $request->tarif;
        $itineraire->save();
        return redirect()->route('admin.index')->with('success','Modification enregistrer avec success');
    }
    public function destroy($id)
    {
        $itineraire = Itineraire::find($id);
        $itineraire->delete();
        return redirect()->route('admin.index')->with('success', 'suppression fait avec succes');
    }
    public function getItineraires(Request $request)
    {
        $itineraires = Itineraire::where('region_id', $request->region_id)->get();
        return response()->json($itineraires);
    }

    public function getByRegion($regionId)
    {
        $itineraires = Itineraire::where('region_id', $regionId)->get();
    
        return response()->json($itineraires);
    }
    public function rules()
    {
        return [
            'region' => 'required',
            'itineraire' => 'required',
            'tarif' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'region.required' => 'Le Champ région est obligatoire',
            'itineraire.required' => 'Le Champ itinéraire est Obligatoire',
            'tarif.required' => 'Le Champ tarif est Obligatoire'
        ];
    }
    
    
    //
}
