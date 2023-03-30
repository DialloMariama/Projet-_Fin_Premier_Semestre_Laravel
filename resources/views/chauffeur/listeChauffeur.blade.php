@extends('layoutss.app')
@section('content')
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
    <div>  
        <div class="card">    
         <div class="card bg-warning text-dark">
                <h2 class="text-center">Liste des Chauffeurs</h2> 
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="list">
       
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>ADRESSE</th>
                <th>EMAIL</th>
                <th>TELEPHONE</th>
                <th>REGION</th>
                <th>ITINERAIRE</th>
                <th>TARIF</th>
                <th>ACTIONS</th>
            </tr>
            <tr>
            @foreach ($chauffeurs as $chauffeur)
            <tr>
                <td>{{ $chauffeur->nom }}</td>
                <td>{{ $chauffeur->prenom }}</td>
                <td>{{ $chauffeur->adresse }}</td>
                <td>{{ $chauffeur->email }}</td>
                <td>{{ $chauffeur->telephone }}</td>
                <td>{{ $chauffeur->region }}</td>
                <td>{{ $chauffeur->itineraire }}</td>
                <td>{{ $chauffeur->tarif }}</td>

                <td>
                    <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()" title="Supprimer Client"><i class="fa fa-trash-o" aria-hidden="true"></i>🗑</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tr>
            <a type="button" class="btn btn-secondary" href="{{route('admin.index')}}">Retour</a>
        </table>  
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
<script>
$(document).ready(function () {
 
 $('#list').DataTable({

     language: {  url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json" }

 });

});
</script>

<script>
    function confirmDelete() {
        if (!confirm("Voullez-vous supprimer ce Chauffeur?")) {
            return false;
        }
    }
</script>


