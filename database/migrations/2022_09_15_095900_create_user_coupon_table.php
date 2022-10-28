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
        Schema::create("user_coupon", function (Blueprint $table) {
            $table->id("user_coupon_id");
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->foreign("user_id")->references("customer_id")->on("customers");
            $table->unsignedBigInteger("coupon_id")->nullable(false);
            $table->foreign("coupon_id")->references("coupon_id")->on("coupons");
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
        Schema::dropIfExists("user_coupon");
    }
};
