<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('des');
            $table->string('currency')->default('USD');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->default('default.jpg');
            $table->string('cover')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->integer('delivery')->default(0);
            $table->integer('payment')->default(0);
            $table->integer('subscription')->default(0);
            $table->integer('timeend')->default(0);
            $table->integer('auto_sub')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
