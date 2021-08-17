<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('des');
            $table->string('price')->nullable();
            $table->string('old_price')->nullable();
            $table->string('made')->nullable();
            $table->string('image')->default('default.png');
            $table->string('status');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('tags')->nullable();
            $table->integer('sale_count')->default(0);
            $table->integer('store_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            // $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
