@extends('layoutss.app')
@section('content')
<div class="container">
    <div class="card bg-warning text-dark">
        <h2 class="text-center">Ajout Région</h2> 
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
            <form action="{{ route('region.store') }}" id="form" method="POST">
            @csrf
                <label for="" class="h5 text-left pt-1">Région</label>
                <select name="region" id="" class="form-control">
                    <option value="">Séléctionnez</option>
                    <option value="Dakar">Dakar</option>
                    <option value="Thies">Thies</option>
                    <option value="StLouis">StLouis</option>
                    <option value="Tamba">Tamba</option>
                    <option value="Kaolack">Kaolack</option>
                    <option value="Zinguinchor">Zinguinchor</option>
                    <option value="Diourbel">Diourbel</option>
                    <option value="Fatick">Fatick</option>
                    <option value="Kolda">Kolda</option>
                    <option value="Louga">Louga</option>
                    <option value="Matam">Matam</option>
                    <option value="Sédhiou">Sédhiou</option>
                    <option value="Kédougou">Kédougou</option>
                    <option value="Kaffrine">Kaffrine</option>                              

                </select>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{route('admin.index')}}">Retour</a>
                    <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                </div>
            </form>
        </div>  
    </div>
</div>
@endsection
<script>
    function confirmDelete() {
        if (!confirm("Etes Vous sûr de vouloir supprimer cette région? Si Oui les Itinéraires associés vont etre supprimées")) {
            return false;
        }
    }
</script>
