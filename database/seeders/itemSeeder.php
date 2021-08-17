<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use App\Models\item;
use Illuminate\Support\Str;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 300; $i++ ) {
            $items = new item;
            $items->name        =   $faker->name;
            $items->slug     = Str::slug($items->name);
            $items->des         =   $faker->text;
            $items->price       =   rand(5000, 10000);
            $items->old_price   =   rand(10000 , 20000);
            $items->made        =   ' Egypt';
            $items->status      =   rand(0,1);
            $items->store_id    =   rand(1, 10);
            $items->category_id =   rand(1, 10);
            $items->save();
        }

    }
}
