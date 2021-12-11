<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id', false, true);
            $table->bigInteger('store_id', false, true);
            $table->tinyText('shipping_address');
            $table->text('note')->nullable();
            $table->bigInteger('promotion_id', false, true);
            $table->bigInteger('transaction_id', false, true)->nullable();
            $table->decimal('total', 8, 2, true);
            $table->timestamps();

            $table->foreign("store_id")->references("id")->on("users");
            $table->foreign("customer_id")->references("id")->on("users");
            $table->foreign("promotion_id")->references("id")->on("promotions");
            $table->foreign("transaction_id")->references("id")->on("transactions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
