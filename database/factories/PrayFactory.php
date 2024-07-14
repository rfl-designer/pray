<?php

namespace Database\Factories;

use App\Models\Pray;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pray::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->text(),
            'ref'  => $this->faker->regexify('[A-Za-z0-9]{48}'),
        ];
    }
}
