<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->string('donation_id', 10)->primary();
            $table->string('staff_id', 10)->nullable();
            $table->string('donor_NIK', 17)->nullable();
            $table->string('food_id', 10)->nullable();
            $table->integer('donation_amount')->nullable();
            $table->date('donation_date')->nullable();

            $table->foreign('staff_id')->references('staff_id')->on('staff');
            $table->foreign('donor_NIK')->references('donor_NIK')->on('donors');
            $table->foreign('food_id')->references('food_id')->on('food_inventory');
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
