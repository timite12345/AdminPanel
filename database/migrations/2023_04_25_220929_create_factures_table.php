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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('hopital');
            $table->string('nom_chauffeur');
            $table->string('email_patient');
            $table->string('montant');
            $table->string('email_hopital');
            $table->string('maladie');
            $table->string('commentaires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
