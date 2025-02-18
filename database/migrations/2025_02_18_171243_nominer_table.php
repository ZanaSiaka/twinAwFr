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
        Schema::create('nominer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUtilisateur');
            $table->unsignedBigInteger('idAward');
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateur');
            $table->foreign('idAward')->references('idAward')->on('award');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominer');
    }
};
