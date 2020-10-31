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
            $table->string('titreCivilité')->default('Mr.');
            $table->string('nomContact')->default('John');
            $table->string('prenomContact')->default('Doe');
            $table->string('deuxiemePrenomContact')->default('Samuel');
            $table->string('intituleEmploi')->nullable();
            $table->string('codeRegionaTelContact')->nullable();
            $table->string('codePaysTelContact')->nullable();
            $table->string('extensionTelContact')->nullable();
            $table->string('TelContact')->nullable();
            $table->string('codeRegFaxContact')->nullable();
            $table->string('codePaysFaxContact')->nullable();
            $table->string('faxContact')->nullable();
            $table->string('courrielContact')->nullable();

            $table->foreignId('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('Suppliers')->onDelete('cascade');
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
