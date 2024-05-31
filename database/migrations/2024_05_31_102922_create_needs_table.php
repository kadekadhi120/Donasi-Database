<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedsTable extends Migration
{
    public function up(): void
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->id();
            $table->string('need_id', 10)->unique();
            $table->string('location_id', 10)->nullable();
            $table->string('food_id', 10)->nullable();
            $table->integer('quantity')->nullable();

            // Foreign key constraints
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade');
            $table->foreign('food_id')->references('food_id')->on('food_inventories')->onDelete('cascade');
            
            // Timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('needs');
    }
}
