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
        Schema::create("refunds", function (Blueprint $table) {
            $table->id("refund_id");
            $table->unsignedBigInteger("user_id")->nullable(false)->unique();
            $table->foreign("user_id")->references("customer_id")->on("customers");
            $table->string("email",80)->nullable(false);
            $table->integer("amount")->nullable(false);
            $table->string("status",30)->nullable(false);
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
        Schema::dropIfExists("refund");
    }
};
