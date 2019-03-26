<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->integer('marka_id');
            $table->decimal('price_by')->nullable();
            $table->decimal('price_sale')->nullable();
            $table->string('image');
            $table->integer('provider_id')->nullable();
            $table->integer('sklad_id')->nullable();
            $table->integer('size_id');
            $table->float('quantity')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
