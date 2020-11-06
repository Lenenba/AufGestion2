<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('nomAdresse');
            $table->string('adresse1');
            $table->string('adresse2');
            $table->string('pays');
            $table->string('ville');
            $table->string('codePostal')->nullable();
            $table->integer('codeRegionaTelAdresse')->nullable();
            $table->integer('codePaysTelAdresse')->nullable();
            $table->integer('extensionTelAdresse')->nullable();
            $table->integer('TelAdresse')->nullable();
            $table->integer('codeRegFaxAdresse')->nullable();
            $table->integer('codePaysFaxAdresse')->nullable();
            $table->integer('faxAdresse')->nullable();
            $table->string('courrielAdresse')->nullable();
            $table->timestamp('deactivationAdresse')->nullable();
            $table->string('province')->nullable();
            $table->string('etat')->nullable();
            $table->string('canton')->nullable();

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
        Schema::dropIfExists('adresses');
    }
}
