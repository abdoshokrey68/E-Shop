<?php

namespace Database\Factories;

use App\Models\store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'des'       => $this->faker->descreption,
            'phone'     => $this->faker->tollFreePhoneNumber,
            'email'     => $this->faker->safeEmail,
            'address'   => $this->faker->address,
            'user_id'   => rand(1, 10),
        ];
    }
}
