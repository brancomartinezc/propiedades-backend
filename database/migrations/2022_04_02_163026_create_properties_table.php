<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('address');
            $table->unsignedInteger('price');
            $table->boolean('for_sale');
            $table->unsignedInteger('beds');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('baths');
            $table->string('description');
            $table->timestamps();
            $table->string('city_zip'); //Foreign key
            $table->unsignedBigInteger('agent_id'); //Foreign key

            $table->foreign('city_zip')->references('zip')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
