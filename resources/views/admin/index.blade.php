@extends('layoutss.app')
@section('content')
<ul class="nav " >
    <li class="nav-item ">
        <a class="nav-link active text-warning" aria-current="page" href="{{ route('ajoutRegion') }}">Ajout Region</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-warning" href="{{ route('listeClient') }}">liste client</a>
    </li>
    <li class="nav-item text-warning">
        <a class="nav-link text-warning" href="{{ route('listeChauffeur') }}">liste chauffeur</a>
    </li>
</u>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-5">
            <div class="card bg-warning text-dark">
                <h2 class="text-center">Ajout Itinéraire</h2> 
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('itineraire.store2') }}" id="form" method="POST">
                @csrf
                <div class="card-body text-dark">
                        <label for="" class="h5 text-left pt-1">Région</label>
                        <select name="region" id="" class="form-control">
                            <option value="">Sélectionnez la Région</option>
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{ $region->nomRegion }}</option>
                            @endforeach
                        </select>
                        <label for="" class="h5 text-left pt-1">Itinéraire</label>
                        <input type="text" class="form-control" name="itineraire">
                        <label for="" class="h5 text-left pt-1">Tarifs</label>
                        <input type="number" min="100" class="form-control" name="tarif">
                        <div>
                        <button class="btn btn-primary mt-3 offset-2">Enregistrer</button>
                        <a href=""  class="btn btn-warning mt-3 offset-2">Retour</a>
                        </div>
                </div>
            </form>
            </div>
            </div>
        </div>
        <div class="col-md-7">
         <div class="card bg-warning text-dark">
                <h2 class="text-center">Liste des Itinéraires</h2> 
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>REGION</th>
                                    <th>ITINERAIRE</th>
                                    <th>TARIF</th>
                                    <th>ACTIONS</th>
                                </tr>         
                            </thead>
                            <tbody>
                                @foreach ($itineraires as $itineraire)
                                <tr>
                                    <td>{{ $itineraire->region_id }}</td>
                                    <td>{{ $itineraire->nomItineraire }}</td>
                                    <td>{{ $itineraire->tarif }}</td>
                                    <td>
                                        <a href="{{ route('update',$itineraire->id)}}" class="btn btn-warning">✍🏽</a>
                                        <form method="POST" action="{{ route('itineraire.destroy',$itineraire->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()" title="Supprimer Region"><i class="fa fa-trash-o" aria-hidden="true"></i>🗑</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                       

                    </table>
                </div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </div>
    <div class="text-end">
</div>

 </div>
 @endsection
            