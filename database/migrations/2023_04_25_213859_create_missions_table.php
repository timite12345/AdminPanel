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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
              $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('estUrgent');
            $table->string('estFacture');
            $table->string('date_Dep');
            $table->string('adresse_Dep');
            $table->string('adresse_Arriv')->nullable();
            $table->string('condTransp');
            $table->string('idChauffeur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
