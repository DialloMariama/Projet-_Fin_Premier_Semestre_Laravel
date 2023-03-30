@extends('layoutss.app')
@section('content')
<div class="container">
    <div class="card bg-warning text-dark">
        <h2 class="text-center">Page de Modification</h2> 
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
    </div>
    @endif
    <div>  
        <div class="card">       
            <form action="{{route('itineraire.update',$itineraire->id)}}" id="form" method="POST">
                
                    @csrf
                    <label for="" class="h5 text-left pt-1">Région</label>
                    <select name="region" id="" class="form-control">
                        @foreach ($regions as $region)
                        <option value="{{$region->id}}" {{ $region->id == $itineraire->region_id ? 'selected' : '' }}> {{ $region->nomRegion }}</option>
                        @endforeach
                    </select>
                    <label for="" class="h5 text-left pt-1">Itinéraire</label>
                    <input type="text" class="form-control" name="itineraire" value="{{$itineraire->nomItineraire}}">
                    <label for="" class="h5 text-left pt-1">Tarifs</label>
                    <input type="number" min="100" class="form-control" name="tarif" value="{{$itineraire->tarif}}">
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href="{{route('admin.index')}}">Retour</a>
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                        <a type="button" class="btn btn-primary" href="{{route('ajoutRegion')}}"> Ajout Region</a>
                    </div>
                </form>
                   
            </div>
    </div>
</div>
@endsection