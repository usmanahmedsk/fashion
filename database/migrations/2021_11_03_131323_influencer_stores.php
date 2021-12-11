<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InfluencerStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influencer_stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('influencer_id', false, true);
            $table->bigInteger('store_id', false, true);
            $table->timestamps();
            $table->foreign("influencer_id")->references("id")->on("users");
            $table->foreign("store_id")->references("id")->on("users");
            $table->unique(['influencer_id', 'store_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('influencer_stores');
    }
}
