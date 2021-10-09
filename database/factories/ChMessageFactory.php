<?php

namespace Database\Factories;

use App\Models\ChMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => mt_rand(9, 999999999) + time(),
            'type' => 'user',
            'broadcast_message_id' => null,
            'from_id' => 1,
            'to_id' => 2,
            'body' => 'fake mesage',
        ];
    }
}
