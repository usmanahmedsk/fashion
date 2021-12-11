<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_types', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50);
            $table->boolean("hasPictures")->default(false);
            $table->bigInteger('user_id', false, true);
            $table->timestamps();
            $table->unique(['type', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_types');
    }
}
