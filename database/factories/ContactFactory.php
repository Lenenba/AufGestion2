<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titreCivilite'=> $this->faker->title,
            'nomContact'=> $this->faker->lastName(),
            'prenomContact'=> $this->faker->firstName(),
            'deuxiemePrenomContact'=> $this->faker->userName,
            'intituleEmploi'=> $this->faker->jobTitle,
            'codeRegionaTelContact'=> $this->faker->numberBetween(100, 500),
            'codePaysTelContact'=> $this->faker->numberBetween(100, 500),
            'extensionTelContact'=> $this->faker->numberBetween(100, 500),
            'TelContact'=> $this->faker->numberBetween(0, 1000),
            'codeRegFaxContact'=> $this->faker->numberBetween(100, 500),
            'codePaysFaxContact'=> $this->faker->numberBetween(100, 500),
            'faxContact'=> $this->faker->numberBetween(10, 1000),
            'courrielContact'=> $this->faker->companyEmail,
            'supplier_id' => Supplier::latest()->first()->id
        ];
    }
}
