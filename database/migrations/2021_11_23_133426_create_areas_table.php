<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment("This auto increment column to generate unique id.");
            $table->string('name', 50)->comment('This column help to store city name.');
            $table->string('name_local', 50)->comment('This column help to store city name in local language.');
            $table->mediumInteger('city_id', false, true)->comment('This column stores state for the city and references state table.');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unique(['name', 'city_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
