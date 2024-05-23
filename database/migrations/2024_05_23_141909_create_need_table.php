<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedTable extends Migration
{
    public function up(): void
    {
        Schema::create('need', function (Blueprint $table) {
            $table->string('need_id', 10)->primary();
            $table->string('location_id', 10)->nullable();
            $table->string('food_id', 10)->nullable();
            $table->integer('quantity')->nullable();

            // Foreign key constraints
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('set null');
            $table->foreign('food_id')->references('food_id')->on('food_inventory')->onDelete('set null');
            
            // Timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('need');
    }
}
