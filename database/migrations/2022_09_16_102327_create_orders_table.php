<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("orders", function (Blueprint $table) {
            $table->id("order_id");
            $table->unsignedBigInteger("user_id")->nullable(false)->unique();
            $table->foreign("user_id")->references("customer_id")->on("customers");
            $table->json("strategy_names")->nullable(false);
            $table->integer("amount")->nullable(false);
            $table->string("coupon")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("order_details");
    }
};
