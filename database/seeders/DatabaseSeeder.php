<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Userseeder;

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
            Userseeder::class,
            premation::class,

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
