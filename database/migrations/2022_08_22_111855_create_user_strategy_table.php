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
        Schema::create("user_strategy", function (Blueprint $table) {
            $table->id("user_strategy_id");
            $table->unsignedBigInteger("user_id")->nullable(false)->unique();
            $table->foreign("user_id")->references("customer_id")->on("customers");
            $table->unsignedBigInteger("strategy_id")->nullable(false)->unique();
            $table->foreign("strategy_id")->references("strategy_brief_id")->on("strategy_brief");
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
        Schema::dropIfExists("user_strategy");
    }
};
