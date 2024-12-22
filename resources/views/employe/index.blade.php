@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-lg-11">
        <h2>Liste des employés</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-success" href="{{ url('employe/create') }}">Ajouter</a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" id="success-alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 5000);
    </script>
@endif

<table class="table table-bordered table-hover shadow rounded" style="border-radius: 10px;">
    <thead style="background-color: #4e73df; color: white; border-radius: 10px 10px 0 0;">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th><i class="fas fa-user me-2"></i> Nom </th>
            <th><i class="fas fa-user-tag me-2"></i>Prénom </th>
            <th><i class="fas fa-building me-2"></i>Company</th>
            <th><i class="fas fa-map-marker-alt me-2"></i>Ville </th>
            <th><i class="fas fa-dollar-sign me-2"></i>Salaire </th>
            <th><i class="fas fa-cogs me-2"></i>Actions </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employes as $index => $employe)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employe->id }}</td>
                <td>{{ $employe->nom }}</td>
                <td>{{ $employe->prénom }}</td>
                <td>{{ $employe->company }}</td>
                <td>{{ $employe->Ville }}</td>
                <td>{{ $employe->Salaire }}</td>
                <td class="text-center">
                    <!-- Dropdown for actions with icons -->
                    <div class="dropdown">
                        <button style="background-color: transparent; color: #4e73df;" class="btn shadow p-1 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="{{ url('employe/' . $employe->id) }}">
                                    <i class="fas fa-eye"></i> Voir
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('employe/' . $employe->id . '/edit') }}">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                            </li>
                            <li>
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $employe->id }}">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet employé ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Attach event listener to all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');

        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const employeId = button.getAttribute('data-id'); // Extract info from data-id attribute
            deleteForm.action = "{{ url('employe') }}/" + employeId; // Set form action dynamically
        });
    });
</script>
@endsection
