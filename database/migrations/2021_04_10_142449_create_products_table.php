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
            $table->enum('stock_status', ['discontinue', 'feature', 'in-stock', 'out-stock', 'special']);
            $table->integer('on_hand');
            $table->string('image');
            $table->text('images');
            $table->string('unit');
            $table->date('expire')->nullable();
            $table->double('regular_price');
            $table->double('expire_price')->nullable();
            $table->double('special_price')->nullable();
            $table->dateTime('special_start')->nullable();
            $table->dateTime('special_end')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
