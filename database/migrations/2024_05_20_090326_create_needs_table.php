<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedsTable extends Migration
{
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->string('need_id', 10)->primary();
            $table->string('location_id', 10)->nullable();
            $table->string('food_id', 10)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('need_purpose', 255)->nullable();
            $table->date('need_date')->nullable();

            $table->foreign('location_id')->references('location_id')->on('locations');
            $table->foreign('food_id')->references('food_id')->on('food_inventory');
        });
    }

    public function down()
    {
        Schema::dropIfExists('needs');
    }
}
