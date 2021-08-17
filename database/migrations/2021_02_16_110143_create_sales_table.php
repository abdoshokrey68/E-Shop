<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('item_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('price');
            $table->timestamps();

            // $table->foreign('item_id')  ->references('id')->on('items') ->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
