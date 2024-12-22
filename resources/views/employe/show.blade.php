@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
            <h2 class="text-center">Détails de l'Employé</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Nom :</th>
                        <td>{{ $employe->nom }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Prénom :</th>
                        <td>{{ $employe->prénom }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Société :</th>
                        <td>{{ $employe->company }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ville :</th>
                        <td>{{ $employe->Ville }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Salaire :</th>
                        <td>{{ $employe->Salaire }} DH</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
