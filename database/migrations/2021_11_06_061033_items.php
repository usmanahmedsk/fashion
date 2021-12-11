<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->bigInteger('store_id', false, true);
            $table->bigInteger('category_id', false, true);
            $table->text('description');
            $table->decimal('price', 8, 2, true);
            $table->boolean("onSale")->default(false);
            $table->decimal('sales_price', 8, 2, true)->nullable();
            $table->foreign("store_id")->references("id")->on("users");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->timestamps();
            $table->unique(['category_id', 'store_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
