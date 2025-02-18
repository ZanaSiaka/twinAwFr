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
        Schema::create('question', function (Blueprint $table) {
            $table->id('idQuestion');
            $table->unsignedBigInteger('idUtilisateur');
            $table->string('contenu');
            $table->boolean('valide')->default(false);
            $table->timestamps();

            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
