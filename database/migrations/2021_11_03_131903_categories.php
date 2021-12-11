<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger("parent_id", false, true);
            $table->bigInteger("appearance_id", false, true);
            $table->bigInteger("user_id", false, true);
            $table->timestamps();
            $table->foreign("parent_id")->references("id")->on("categories");
            $table->foreign("appearance_id")->references("id")->on("appearances");
            $table->foreign("user_id")->references("id")->on("users");
            $table->unique(['name', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
