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
        Schema::create('offer_subscribers', function (Blueprint $table) {
            $table->id("offer_subscriber_id");            
            $table->unsignedBigInteger("offer_id")->nullable(false)->unique();
            $table->foreign("offer_id")->references("offer_id")->on("offers");
            $table->integer("subscribers")->nullable(false);
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
        Schema::dropIfExists('offer_subscribers');
    }
};
