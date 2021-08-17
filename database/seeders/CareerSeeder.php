<?php

namespace Database\Seeders;

use App\Models\career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i > 50; $i++)
        {
            $career = new career;
            $career->name   = $faker->name;
            $career->des    = $faker->text;
            $career->salary = rand(1000, 30000);
            $career->store_id = rand(1, 50);
            $career->save();
        }
    }
}
