<?php

namespace Database\Factories;

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
            'nom' => $this->faker->name,
            'autreNom' => $this->faker->name,
            'numero' => $this->faker->randomFloat(),
            'type' => $this->faker->randomElement(['SUPPLIER', 'AUF_ALLOCATAIRE', 'AUF_MISSIONNAIRE', 'AUF_STAGIAIRE']),
            'typeOrganisation' => $this->faker->randomElement(['CORPORATION', 'INDIVIDUAL']),
            'statut' => $this->faker->randomElement(['DFCG', 'COMPTABLE', 'DEMANDEUR', 'BROUILLON', 'A SUPPRIMER'])
        ];
    }
}
