<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Countries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->tinyIncrements("id")->comment("This auto increment column to generate unique id.");;
            $table->char('iso', 2)->unique()->comment('This column is to store iso (short name) for the country.');
            $table->string('name', 50)->unique()->comment('This column is to store country name.');
            $table->string('phone',6)->comment('This column is used to store country code.');
            $table->unique(['iso', 'name', 'phone']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
