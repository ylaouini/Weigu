<?php

namespace Database\Seeders;

use App\Models\BroadcastMessage;
use App\Models\User;
use Database\Factories\BroadcastMessageFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeed::class,
        ]);
        BroadcastMessage::factory(200)->create();
        // \App\Models\User::factory(10)->create();
    }
}
