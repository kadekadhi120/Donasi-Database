<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donation_id', 10)->unique();
            $table->string('staff_id', 10)->nullable();
            $table->string('donor_NIK', 17)->nullable();
            $table->string('food_id', 10)->nullable();
            $table->integer('donation_amount')->nullable();
            $table->date('donation_date')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('staff_id')->on('staff');
            $table->foreign('donor_NIK')->references('donor_NIK')->on('donors');
            $table->foreign('food_id')->references('food_id')->on('food_inventories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
