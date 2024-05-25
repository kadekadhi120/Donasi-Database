<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('food_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('food_id', 10)->unique();
            $table->string('food_name', 50)->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_inventories');
    }
}
