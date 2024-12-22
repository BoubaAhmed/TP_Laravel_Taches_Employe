<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\TacheController;
use App\Models\Employe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    $employes = Employe::all();
    return
        view('employe.index', compact('employes'));
});

Route::controller(EmployeController::class)->group(function () {
    Route::get('/employe', 'index');
    Route::get('/employe/create', 'create');
    Route::post('/employe', 'store');
    Route::get('/employe/{id}', 'show');
    Route::get('/employe/{id}/edit', 'edit');
    Route::patch('/employe/{id}', 'update');
    Route::delete('/employe/{id}', 'destroy');
});

Route::controller(TacheController::class)->group(function () {
    Route::get('/tache', 'index');
    Route::get('/tache/create', 'create');
    Route::post('/tache', 'store');
    Route::get('/tache/{id}', 'show');
    Route::get('/tache/{id}/edit', 'edit');
    Route::patch('/tache/{id}', 'update');
    Route::delete('/tache/{id}', 'destroy');
});
