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
        Schema::create("coupons", function (Blueprint $table) {
            $table->id("coupon_id");
            $table->string("code",20)->unique()->nullable(false);
            $table->string("description")->nullable(false);
            $table->integer("discount")->nullable(false);
            $table->string("type")->nullable(false)->default("percent");
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
        Schema::dropIfExists("coupons");
    }
};
