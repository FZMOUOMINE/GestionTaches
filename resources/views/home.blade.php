@extends('layout')

@section('content')
    

{{-- @foreach($projects as $project)
<h1>{{$project->nom_projet}}</h1>
<li>{{$project->type_projet}}</li>
<li>{{$project->date_debut}}</li>
@endforeach --}}
<div class="container">
<form method="POST" action="{{route('projects.store')}}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="typeProjet">Type Projet</label>
            <select id="typeProjet" class="form-control" name ="typeProjet">
                <option selected>choisir...</option>
                <option>Application web</option>
                <option>Application Mobile</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="nomProjet">Nom Projet</label>
            <input type="text" name ="nomProjet" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="dateDebut">Date de début</label>
            <input type="date" name ="dateDebut" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="dateLivraison">Date de livraison estimé</label>
            <input type="date" name ="dateLivraison" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="description">Description</label>
            <textarea  name ="description" class="form-control" row="3"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
</div>
{{-- Afficher la liste des projets --}}

<div class="container mt-5">
    <h2 class="mb-4">Liste des projets</h2>
    <table id="" class="table table-bordered myTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Type de projet</th>
                <th>Nom du projet</th>
                <th>Description</th>
                <th>Date Début</th>
                <th>Date Livraison estimé</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function(){
          var table = $('.myTable').DataTable({
              //processing: true,
              serverSide: true,
              //ordering: true,
              ajax: "{{ route('projects.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'type_projet', name: 'type_projet'},
                  {data: 'nom_projet', name: 'nom_projet'},
                  {data: 'description', name: 'description'},
                  {data: 'date_debut', name: 'date_debut'},
                  {data: 'date_livraison', name: 'date_livraison'},
                  {data: 'action', name: 'action', orderable: false, searchable: false}
              ],
              language: {
                'lengthMenu': 'Display _MENU_',
                'sProcessing': "Traitement en cours ...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "sZeroRecords": "Aucun résultat trouvé",
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
                "sInfoEmpty": "Aucune ligne affichée",
                "sInfoFiltered": "(Filtrer un maximum de _MAX_)",
                "sInfoPostFix": "",
                "sSearch": "Chercher:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Chargement...",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sLast": "Dernier",
                    "sNext": "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending": ": Trier par ordre croissant",
                    "sSortDescending": ": Trier par ordre décroissant"
                }
            },
          });
        });
</script>

@endsection