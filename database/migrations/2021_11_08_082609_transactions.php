<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('platform_id', false, true);
            $table->bigInteger('method_id', false, true);
            $table->decimal('amount', 8, 2, true);
            $table->string('transaction_id');
            $table->timestamps();
            $table->foreign("platform_id")->references("id")->on("payment_platforms");
            $table->foreign("method_id")->references("id")->on("payment_methods");
            $table->unique(['platform_id', 'method_id', 'transaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
