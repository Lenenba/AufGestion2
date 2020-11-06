<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('titreCivilite')->nullable();
            $table->string('nomContact')->nullable();
            $table->string('prenomContact')->nullable();
            $table->string('deuxiemePrenomContact')->nullable();
            $table->string('intituleEmploi')->nullable();
            $table->integer('codeRegionaTelContact')->nullable();
            $table->integer('codePaysTelContact')->nullable();
            $table->integer('extensionTelContact')->nullable();
            $table->integer('TelContact')->nullable();
            $table->integer('codeRegFaxContact')->nullable();
            $table->integer('codePaysFaxContact')->nullable();
            $table->integer('faxContact')->nullable();
            $table->string('courrielContact')->nullable();

            $table->foreignId('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('contacts');
    }
}
