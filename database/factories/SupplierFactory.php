<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use phpDocumentor\Reflection\Types\This;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomFournisseur' => $this->faker->company,
            'autreNom' => $this->faker->company,
            'numero' => $this->faker->buildingNumber,
            'typeFournisseur' => $this->faker->randomElement(['SUPPLIER', 'AUF_ALLOCATAIRE', 'AUF_MISSIONNAIRE', 'AUF_STAGIAIRE']),
            'typeOrganisation' => $this->faker->randomElement(['CORPORATION', 'INDIVIDUAL']),
            'statut' => $this->faker->randomElement(['DFCG', 'COMPTABLE', 'DEMANDEUR', 'BROUILLON', 'A SUPPRIMER']),
            'dateNaissance' => $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'prestationFourni'=> $this->faker->jobTitle,
            'nationalite' => $this->faker->country,
            'deactivationEntete' =>  $this->faker->dateTimeBetween('+0 days', '+2 years')
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Supplier $supplier) {
            Contact::factory()->create([
                'supplier_id' => $supplier->id
            ]);
        });
    }
}
