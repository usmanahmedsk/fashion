<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class States extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->mediumIncrements("id")->comment("This auto increment column to generate unique id.");
            $table->string('name', 50)->comment('This column help to store state name.');
            $table->tinyInteger('country_id', false, true)->comment('This column stores country for the state and references countries table.');
            $table->char('short_tag', 2)->comment('This column store short tag for state.');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unique(['name', 'short_tag', 'country_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
