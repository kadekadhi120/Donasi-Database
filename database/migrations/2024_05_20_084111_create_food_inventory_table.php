<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodInventoryTable extends Migration
{
    public function up()
    {
        Schema::create('food_inventory', function (Blueprint $table) {
            $table->string('food_id', 10)->primary();
            $table->string('food_name', 50)->nullable();
            $table->integer('quantity')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_inventory');
    }
}
