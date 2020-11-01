<?php

namespace Database\Factories;

use App\Models\Adresse;
use App\Models\Site;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //city
            'nomSite' => $this->faker->countryCode."-".$this->faker->city,
            'envoicde' => $this->faker->randomElement(['NONE', 'EMAIL', 'FAX', 'PRINT']),
            'modePaiement' => $this->faker->randomElement(['Espece', 'Electronique', 'AUF_Virement', 'Cheque']),
            'courrielSite' => $this->faker->companyEmail,
            'paieOnRecip' => $this->faker->boolean(),
            'conditionPaiement' => $this->faker->words(8, true),
            'groupePaie'=> $this->faker->words(8, true),
            'tolerancesMontant'=> $this->faker->words(8, true),
            'ventilation' => $this->faker->randomElement(['101-000-46710-000-000-000-000-000', '101-000-40100-000-000-000-000-000']),
            'banque'=> $this->faker->company,
            'iban'=> $this->faker->iban(),
            'devise'=> $this->faker->currencyCode,
            'numeroCompteB'=> $this->faker->bankAccountNumber,
            'projet'=> $this->faker->words(8, true),
            'domaine'=> $this->faker->words(8, true),
            'region'=> $this->faker->words(8, true),
            'mobilite'=> $this->faker->words(8, true),
            'etablismnOrigine'=> $this->faker->words(8, true),
            'etablismnAcceuil'=> $this->faker->words(8, true),
            'debutMobilite'=> $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'finMobilite'=> $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'discipline'=> $this->faker->words(8, true),
            'montantUnitaire' => $this->faker->numberBetween(0, 9),
            'adresse_id' => Adresse::factory()->create(),
            'supplier_id' => function (array $attributes) {
                return Adresse::find($attributes['adresse_id'])->supplier_id;
            }
        ];
    }
}
