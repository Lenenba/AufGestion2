<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nomFournisseur')->unique();
            $table->string('autreNom')->nullable();
            $table->string('nationalite')->nullable();
            $table->enum('typeFournisseur', ['SUPPLIER', 'AUF_ALLOCATAIRE', 'AUF_MISSIONNAIRE', 'AUF_STAGIAIRE'])->default('SUPPLIER');
            $table->string('prestationFourni')->nullable();
            $table->integer('numero')->nullable();
            $table->enum('typeOrganisation', ['CORPORATION', 'INDIVIDUAL'])->default('CORPORATION');
            $table->enum('statut', ['DFCG', 'COMPTABLE', 'DEMANDEUR', 'BROUILLON', 'A SUPPRIMER'])->default('BROUILLON');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
