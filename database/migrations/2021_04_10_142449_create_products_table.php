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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('long_description');
            $table->unsignedBigInteger('category_id');
            $table->string('sku');
            $table->enum('stock_status', ['in-stock', 'out-stock', 'special', 'feature']);
            $table->integer('on_hand');
            $table->string('main_image');
            $table->text('images');
            $table->string('unit');
            $table->double('regular_price');
            $table->double('special_price');
            $table->dateTime('special_start');
            $table->dateTime('special_end');
            $table->boolean('is_active')->default(true);
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
