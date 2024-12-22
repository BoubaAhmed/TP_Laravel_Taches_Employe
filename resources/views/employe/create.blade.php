@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="background-color: transparent;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 600px; border-radius: 15px;">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #4e73df;">Ajouter un Employé</h2>

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
            <form action="{{ url('employe') }}" method="POST">
                @csrf
                <div class="d-flex mb-3">
                    <div class="form-group w-100 me-1">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez un nom" required>
                    </div>
    
                    <div class="form-group w-100 ms-1">
                        <label for="prénom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prénom" name="prénom" placeholder="Entrez un prénom" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Nom de l'entreprise">
                </div>

                <div class="form-group mb-3">
                    <label for="Salaire" class="form-label">Salaire (DH)</label>
                    <input type="number" class="form-control" id="Salaire" name="Salaire" placeholder="Entrez le salaire">
                </div>

                <div class="form-group mb-3">
                    <label for="Ville" class="form-label">Ville</label>
                    <textarea class="form-control" id="Ville" name="Ville" rows="3" placeholder="Entrez la ville"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="background-color: #4e73df; border: none; border-radius: 5px;">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
