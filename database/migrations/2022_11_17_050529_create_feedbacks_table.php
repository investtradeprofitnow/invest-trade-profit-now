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
        Schema::create("feedbacks", function (Blueprint $table) {
            $table->id("feedback_id");
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->foreign("user_id")->references("customer_id")->on("customers");
            $table->integer("rating")->nullable(false);
            $table->string("feedback",5000)->nullable(false);
            $table->string("anonymous")->nullable("false")->default("no");
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
        Schema::dropIfExists('feedbacks');
    }
};
