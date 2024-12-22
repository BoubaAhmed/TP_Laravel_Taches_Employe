<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
        Schema::create('taches', function (Blueprint $table) { 
            $table->id(); 
            $table->timestamps(); 
            $table->string('intituléTache'); 
            $table->date('date_tache'); 
            $table->foreignId('Num_Employe')->constrained('employes')->cascadeOnDelete(); 
            //$table->foreignId('Num_Employe')->references('id')->on('employes');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
