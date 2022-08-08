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
        Schema::create('strategy_short', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('video')->nullable(false);
            $table->string('created_by')->nullable(false);
            $table->string('updated_by')->nullable(false);
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
        Schema::dropIfExists('strategy_short');
    }
};
