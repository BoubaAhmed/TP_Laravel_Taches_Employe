@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
            <h2 class="text-center">Détails de la Tâche</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Intitulé Tâche :</th>
                        <td>{{ $tache->intituléTache }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date de la Tâche :</th>
                        <td>{{ $tache->date_tache }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Numéro Employé :</th>
                        <td>{{ $tache->Num_Employe }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
