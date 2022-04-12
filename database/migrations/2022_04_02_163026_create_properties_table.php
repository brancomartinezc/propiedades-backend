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
            $table->unsignedInteger('area');
            $table->unsignedInteger('price');
            $table->string('sale_rent');
            $table->unsignedInteger('beds');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('baths');
            $table->string('description', 5000)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('city_id'); //Foreign key
            $table->unsignedBigInteger('agent_id'); //Foreign key

            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
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
