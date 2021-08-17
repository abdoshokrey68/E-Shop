<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use App\Models\store;
use Illuminate\Support\Str;

class storeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++ ) {
            $stores = new store;
            $stores->name        = $faker->name;
            $stores->slug     = Str::slug($stores->name);

            $stores->des         = $faker->text;
            $stores->email       = $faker->safeEmail;
            $stores->phone       = $faker->phoneNumber;
            $stores->address     = $faker->address;
            $stores->user_id     = $i;
            $stores->subscription = 1;
            $stores->timeend    = 1365513246;
            $stores->save();
        }



        // for ($i = 0; $i < 10; $i++ ) {
        //     $items = new store;
        //     $items->name    = ' SHOKREY ' . rand(1, 10000);
        //     $items->des     = ' Learn English Free with some Bible stories, starting with Abraham. Explore the Bible. Learn the Story. Examine the Message. Take a Look at the Book. Types: Read and listen to story, Articles in English, & 30 other languages.';
        //     $items->phone   = '(888) 937-7238';
        //     $items->address   = '8888 Cummings Vista Apt. 101, Susanbury, NY 95473';
        //     $items->user_id   = $i;
        //     $items->save();
        // }

    }
}
