<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('account_number', 10);
            $table->string('api_token')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('address_line_3')->nullable();
            $table->unsignedSmallInteger('area')->nullable();
            $table->unsignedSmallInteger('city')->nullable();
            $table->unsignedSmallInteger('province')->nullable();
            $table->char('postal_code', 10)->nullable();
            $table->string('ps1970')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->double('delivery_group')->nullable();
            $table->boolean('newsletter')->default(1);
            $table->boolean('is_sms')->default(1);
            $table->boolean('is_getinked')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
