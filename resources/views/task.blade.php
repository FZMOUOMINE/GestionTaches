@extends('layout')
@section('content')

<div class="container">

<h3>Projet: {{$project->nom_projet}}</h3>
<div></div>
<form method="POST" action="{{route('tasks.store')}}">
    @csrf
    <div class="form-row">
        <input type="text" name ="idProject" id="project-id" class="form-control" value="{{$project->id}}" hidden>
        <div class="form-group col-md-6">
            <label for="nomTache">Nom de la tâche</label>
            <input type="text" name ="nomTache" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="description">Description</label>
            <textarea  name ="description" class="form-control" row="2"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="dateDebut">Date de début</label>
            <input type="date" name ="dateDebut" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="dateFin">Date de Fin</label>
            <input type="date" name ="dateFin" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="membre">Affectée a</label>
            <select id="membre" class="form-control" name ="membre">
                <option value= "0"selected >choisir...</option>
                @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->nom }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
</div>
{{-- Afficher la liste des tâches --}}

<div class="container mt-5">
    <h2 class="mb-4">Liste des Tâches</h2>
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
               
                <th>Nom de la tâche</th>
                <th>Description</th>
                <th>Affectée a</th>
                <th>Date Début</th>
                <th>Date Livraison estimé</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function(){
          var table = $('#myTable').DataTable({
              //processing: true,
              serverSide: true,
              //ordering: true,
              ajax: {
                url : "{{ route('tasks.index') }}",
                data: function (d) {
                d.project_id = $('#project-id').val();
              } 
              },
              
              columns: [
                  {data: 'nom_tache', name: 'nom_tache'},
                  {data: 'description', name: 'description'},
                  {data: 'full_name', name: 'full_name'},
                  {data: 'date_debut', name: 'date_debut'},
                  {data: 'date_livraison', name: 'date_livraison'},
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