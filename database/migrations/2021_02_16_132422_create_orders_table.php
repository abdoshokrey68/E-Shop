<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('des')->nullable();
            $table->string('price');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('count')->default(1);
            $table->integer('pay_status')->default(0); // Defoult Result = 0 ======== If Is Done = 1
            $table->integer('status')->default(0); // Defoult Result = 0 ======== If Is Done = 1
            $table->integer('item_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('category_id')->unsigned();
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
        Schema::dropIfExists('orders');
    }
}
