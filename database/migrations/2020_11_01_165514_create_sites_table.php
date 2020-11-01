<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('nomSite');
            $table->enum('envoicde', ['NONE', 'EMAIL', 'FAX', 'PRINT'])->default('NONE');
            $table->enum('modePaiement', ['Espece', 'Electronique', 'AUF_Virement', 'Cheque'])->default('Espece');
            $table->string('courrielSite')->nullable();
            $table->boolean('paieOnRecip')->default(false);
            $table->string('conditionPaiement')->nullable();
            $table->string('groupePaie');
            $table->string('tolerancesMontant')->nullable();
            $table->enum('ventilation', ['101-000-46710-000-000-000-000-000', '101-000-40100-000-000-000-000-000'])->default('101-000-40100-000-000-000-000-000');
            $table->string('banque')->nullable();
            $table->string('iban')->nullable();
            $table->string('devise')->default('EUR');
            $table->string('numeroCompteB')->nullable();
            $table->string('projet')->nullable();
            $table->string('domaine')->nullable();
            $table->string('region')->nullable();
            $table->string('mobilite')->nullable();
            $table->string('etablismnOrigine')->nullable();
            $table->string('etablismnAcceuil')->nullable();
            $table->timestamp('debutMobilite')->nullable();
            $table->timestamp('finMobilite')->nullable();
            $table->string('discipline')->nullable();
            $table->string('montantUnitaire')->nullable();
            
            $table->foreignId('supplier_id')->constrained('Suppliers');
            $table->foreignId('adresse_id')->constrained('Adresses');

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
        Schema::dropIfExists('sites');
    }
}
