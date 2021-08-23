<?php

namespace Database\Factories;

use App\Models\BroadcastMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BroadcastMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BroadcastMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'message' => $this->faker->text(100),
            'status' => $this->faker->boolean(70),
        ];
    }
}
