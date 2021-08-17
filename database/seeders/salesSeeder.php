<?php

namespace Database\Seeders;

use App\Models\sale;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
class salesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 10; $i++ ) {

            $sale = new sale;
            // $sale->name    = ' SHOKREY ' . rand(1, 10000);
            // $sale->des     = ' Learn English Free with some Bible stories, starting with Abraham. Explore the Bible. Learn the Story. Examine the Message. Take a Look at the Book. Types: Read and listen to story, Articles in English, & 30 other languages.';
            // $sale->parent   = 0;
            // $sale->store_id   = 2;
            $sale->save();
        }

    }
}
