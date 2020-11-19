<?php

namespace Database\Factories;

use App\Models\Devis;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Devis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $year  = date('Y');
        $month = $this->faker->month;
        $id = 0;
        $id = $id++;

        return [
            'client_id'     => $this->faker->numberBetween(1, 5), 
            'filename'      => "DE-{$year}-{$month}-{$id}.pdf", 
            'tva'           => 8.5, 
            'is_accepted'   => true
        ];
    }
}
