
@extends('layoutss.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/png" href="/path/to/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="container">
    <div >
        <div class="col-md-6 mx-auto">
            <div class="card bg-warning text-dark">
                <h2 class="text-center">Enregistrement du client</h2> 
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('enregClient') }}" id="form" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                         <div class="card-body text-dark">
                        <label for="" class="h5 text-left pt-1">Région</label>
                        <select name="region" id="region" class="form-control">
                            <option value="">Sélectionnez la Région</option>
                            @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->nomRegion }}</option>
                            @endforeach
                        </select>
                        <label for="itineraire" class="h5 text-left pt-1">Itinéraire</label>
                        <select id="itineraire" onchange="tarifItineraire()" class="form-control" name="itineraire" disabled>

                        </select>
                        <label for="" class="h5 text-left pt-1">Tarifs</label>
                        <input type="text" class="form-control" id="tarif" name="tarif" disabled>
                        <div>
                        <button class="btn btn-primary mt-3 offset-2">Enregistrer</button>
                        <a href=""  class="btn btn-warning mt-3 offset-2">Retour</a>
                        </div>
                </div>
            </form>
            </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Déconnexion</button>
            </form>
        </div>
</div>
@endsection

<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>
<script>

    var regionIdGlobal
$(document).ready(function() {
  // Lorsque la région est sélectionnée, afficher les itinéraires correspondants
  $('#region').on('change', function() {
    this.regionIdGlobal = $(this).val() ;
    
    var regionId = $(this).val();
    afficherItineraires(regionId);
  });
});


function afficherItineraires(regionId) {
    $('#itineraire').prop('disabled', true);
    $.ajax({
        url: '/itineraireChauffeur/' + regionId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            $('#tarif').val(data[0].tarif);

            
            $('#itineraire').empty();
            $.each(data, function(index, itineraire) {
                $('#itineraire').append('<option value="' + itineraire.id + '">' + itineraire.nomItineraire + '</option>');
            });
            var itineraireId = $('#itineraire').val();

   /*         
    $.ajax({
        url: '/getTarifChauffeur/' + itineraireId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#tarif').val(data.tarif);
            // Activer le champ tarif après avoir fini de le remplir
            $('#tarif').prop('disabled', true);
        },
        error: function() {
            console.log('Une erreur s\'est produite lors de la récupération du tarif de l\'itinéraire.');
        }
    }); 
    */

            $('#itineraire').prop('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Une erreur s\'est produite : ' + textStatus + ' - ' + errorThrown);
        }
    });
}



function tarifItineraire() {
    var regionId = $('#region').val();
    var itineraireId =  $('#itineraire').val();
    //console.log(itineraireId)

    $.ajax({
        url: '/itineraireChauffeur/' + regionId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            data.forEach(tarif => {
                if(tarif.id==itineraireId)
                {    
                    $('#tarif').val(tarif.tarif);

                }
                
            });

            // Activer le champ tarif après avoir fini de le remplir
            $('#tarif').prop('disabled', true);
        },
        error: function() {
            console.log('Une erreur s\'est produite lors de la récupération du tarif de l\'itinéraire.');
        }
    }); 

} 


$('#region').on('change', function() {
    var regionId = $(this).val();
    if(regionId) {
        afficherItineraires(regionId);
    } else {
        $('#itineraire').empty().prop('disabled', true);
    }
});




// </script>