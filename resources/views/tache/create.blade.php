@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="background-color: transparent;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 600px; border-radius: 15px;">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #4e73df;">Ajouter une Tâche</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erreur(s) :</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ url('tache') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="intituléTache" class="form-label">Intitulé de la Tâche</label>
                    <input type="text" class="form-control" id="intituléTache" name="intituléTache" placeholder="Entrez l'intitulé de la tâche" required>
                </div>

                <div class="form-group mb-3">
                    <label for="date_tache" class="form-label">Date de la Tâche</label>
                    <input type="date" class="form-control" id="date_tache" name="date_tache" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Num_Employe" class="form-label">Numéro Employé</label>
                    <select class="form-control" id="Num_Employe" name="Num_Employe">
                        @foreach ($employes as $index => $employe)
                            <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prénom }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="background-color: #4e73df; border: none; border-radius: 5px;">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
