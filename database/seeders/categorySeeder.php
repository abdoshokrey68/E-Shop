<?php

namespace Database\Seeders;

use App\Models\category;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++ )
        {
            $category = new category;
            $category->name         = $faker->word;
            $category->slug         = Str::slug($category->name);
            $category->des          = $faker->text;
            $category->parent       = 0;
            $category->store_id     = rand(1, 10);
            $category->save();
        }

    }
}
