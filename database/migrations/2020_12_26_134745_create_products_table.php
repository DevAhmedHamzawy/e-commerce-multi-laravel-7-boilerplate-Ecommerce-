<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id');
            $table->integer('code');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->bigInteger('price');
            $table->text('description');
            $table->text('options');
            $table->boolean('shipping');
            $table->boolean('packing');
            $table->boolean('special');
            $table->text('available_areas');
            $table->text('delivery_areas');
            $table->string('other_images');
            $table->text('meta_description')->nullable();
            $table->bigInteger('qty');
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
