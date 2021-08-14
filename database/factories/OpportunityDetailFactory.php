<?php

namespace Database\Factories;

use App\Models\OpportunityDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpportunityDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'benefits' => $this->faker->text(100),
            'application_process' => $this->faker->text(100),
            'further_queries' => $this->faker->text(100),
            'eligibilities' => $this->faker->text(100),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'official_link' => $this->faker->url(),
        ];
    }
}
