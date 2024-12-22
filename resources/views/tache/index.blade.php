@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-11">
            <h2>Liste des Taches</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('tache/create') }}">Ajouter</a>
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
                    alert.classList.add('fade-out'); // Add a fade-out class
                    setTimeout(() => alert.style.display = 'none', 1000); // Wait for fade-out
                }
            }, 5000); // 5 seconds

            // In your CSS:
            // .fade-out { opacity: 0; transition: opacity 1s ease-out; }
        </script>
    @endif

    <table class="table table-bordered table-hover shadow rounded" style="border-radius: 10px;">
        <thead style="background-color: #4e73df; color: white; border-radius: 10px 10px 0 0;">
            <tr>
                <th>Numéro</th>
                <th><i class="fas fa-tasks me-2"></i> Intitulé Tache</th>
                <th><i class="fas fa-calendar-alt me-2"></i> Date Tache</th>
                <th><i class="fas fa-id-badge me-2"></i> Numéro Employé</th>
                <th><i class="fas fa-cogs me-2"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($taches->isEmpty())
                <tr>
                    <td colspan="5" class="text-center text-muted">Aucune tâche trouvée.</td>
                </tr>
            @else
                @foreach ($taches as $index => $tache)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tache->intituléTache }}</td>
                        <td>{{ $tache->date_tache }}</td>
                        <td>{{ $tache->Num_Employe }}</td>
                        <td class="text-center">
                            <!-- Dropdown for actions with icons -->
                            <div class="dropdown">
                                <button style="background-color: transparent; color: #4e73df;" 
                                        class="btn shadow-sm p-1 dropdown-toggle" 
                                        type="button" id="dropdownMenuButton" 
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('tache/' . $tache->id) }}">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('tache/' . $tache->id . '/edit') }}">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $tache->id }}">
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Modal for Deletion Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Center the modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette tâche ?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set the action of the form dynamically based on the clicked task
        const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tacheId = this.getAttribute('data-id');
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.action = '/tache/' + tacheId;
            });
        });
    </script>
@endsection
