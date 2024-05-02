<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Betting;

class BettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Betting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'accountt_id' => $this->faker->word(),
            'ticket_number' => $this->faker->word(),
            'time' => $this->faker->word(),
            'date' => $this->faker->date(),
            'fighting_number' => $this->faker->numberBetween(-10000, 10000),
            'bit_type' => $this->faker->word(),
            'amount' => $this->faker->randomFloat(2, 0, 99999999.99),
            'rate' => $this->faker->randomFloat(2, 0, 99.99),
        ];
    }
}
