<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attribute_id', false, true);
            $table->bigInteger('file_id', false, true);
            $table->timestamps();
            $table->foreign("attribute_id")->references("id")->on("attributes");
            $table->foreign("file_id")->references("id")->on("files");
            $table->unique(['attribute_id', 'file_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_files');
    }
}
