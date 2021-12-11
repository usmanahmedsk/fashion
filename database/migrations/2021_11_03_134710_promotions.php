<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promotions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('promo_code', 30)->unique();
            $table->integer('minimum_amount', false, true)->nullable();
            $table->bigInteger('discount_type_id', false, true);
            $table->integer('discount_value', false, true);
            $table->bigInteger('status', false, true);
            $table->timestamps();
            $table->foreign("discount_type_id")->references("id")->on("discount_types");
            $table->foreign("status")->references("id")->on("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
