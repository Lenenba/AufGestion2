<?php

namespace Database\Factories;

use App\Models\Adresse;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdresseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adresse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nomAdresse' => $this->faker->countryCode."-".$this->faker->city,
            'adresse1' => $this->faker->address,
            'adresse2' => $this->faker->secondaryAddress,
            'pays' => $this->faker->country,
            'ville' => $this->faker->city,
            'codePostal'=> $this->faker->postcode,
            'codeRegionaTelAdresse'=> $this->faker->numberBetween(0, 5),
            'codePaysTelAdresse'=> $this->faker->numberBetween(0, 5),
            'extensionTelAdresse'=> $this->faker->numberBetween(0, 5),
            'TelAdresse'=> $this->faker->numberBetween(0, 10),
            'codeRegFaxAdresse'=> $this->faker->numberBetween(0, 5),
            'codePaysFaxAdresse'=> $this->faker->numberBetween(0, 5),
            'faxAdresse'=> $this->faker->numberBetween(0, 10),
            'courrielAdresse'=> $this->faker->companyEmail,
            'deactivationAdresse'=> $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'province'=> $this->faker->city,
            'etat'=> $this->faker->city,
            'canton'=> $this->faker->city,
            'supplier_id' => Supplier::factory()->create()
        ];
    }
}
