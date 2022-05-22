<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paciente;
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
        User::factory(5)->create();
        Paciente::factory(10)->create();
    }
}
