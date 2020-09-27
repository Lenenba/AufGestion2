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
            $table->string('nom');
            $table->enum('type', ['SUPPLIER', 'AUF_ALLOCATAIRE', 'AUF_MISSIONNAIRE', 'AUF_STAGIAIRE']);
            $table->string('autreNom');
            $table->integer('numero')->nullable();
            $table->enum('typeOrganisation', ['CORPORATION', 'INDIVIDUAL']);
            $table->enum('statut', ['DFCG', 'COMPTABLE', 'DEMANDEUR', 'BROUILLON', 'A SUPPRIMER']);
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
