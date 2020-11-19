<?php

namespace Database\Factories;

use App\Models\ClientAddresses;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientAddressesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientAddresses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address'   => $this->faker->address,
            'postcode'  => 97427,
            'city'      => $this->faker->city,
            'client_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
