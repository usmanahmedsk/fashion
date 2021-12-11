<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id', false, true);
            $table->bigInteger('file_id', false, true);
            $table->timestamps();
            $table->foreign("item_id")->references("id")->on("items");
            $table->foreign("file_id")->references("id")->on("files");
            $table->unique(['item_id', 'file_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_files');
    }
}
