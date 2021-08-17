<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('des');
            $table->integer('store_id');
            $table->integer('salary')->nullable();
            $table->integer('career_system')->default(0);
            // 0 = Unlimited period
            // 1 = limited time
            // 2 = employment contract
            $table->integer('status')->default(1);
            // 1 الوظيفة مازالت مفتوحة  &&
            // 0 الوظيفة مغلقة حاليا
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
