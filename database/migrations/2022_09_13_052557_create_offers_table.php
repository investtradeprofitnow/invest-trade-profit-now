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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('strategy_id')->nullable(false)->unique();
            $table->foreign('strategy_id')->references('id')->on('strategy_short');
            $table->string('strategy_name',50)->nullable(false);
            $table->string('description')->nullable(false);
            $table->integer('discount')->nullable(false);
            $table->string('type')->nullable(false)->default('percent');
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
        Schema::dropIfExists('offers');
    }
};
