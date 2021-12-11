<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment("This auto increment column to generate unique id.");
            $table->string('name', 50)->comment('This column help to store city name.');
            $table->mediumInteger('state_id', false, true)->comment('This column stores state for the city and references state table.');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unique(['name', 'state_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
