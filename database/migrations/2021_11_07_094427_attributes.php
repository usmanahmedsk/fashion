<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id', false, true);
            $table->bigInteger('item_id', false, true);
            $table->string('name', 50);
            $table->text('thumbnail');
            $table->timestamps();
            $table->foreign("item_id")->references("id")->on("items");
            $table->foreign("type_id")->references("id")->on("attribute_types");
            $table->unique(['type_id', 'item_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
