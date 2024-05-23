<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionTable extends Migration
{
    public function up()
    {
        Schema::create('distribution', function (Blueprint $table) {
            $table->string('distribution_id', 10)->primary();
            $table->string('need_id', 10)->nullable();
            $table->string('volunteer_id', 10)->nullable();
            $table->string('staff_id', 10)->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->date('distribution_date')->nullable();

            $table->foreign('need_id')->references('need_id')->on('need');
            $table->foreign('volunteer_id')->references('volunteer_id')->on('volunteers');
            $table->foreign('staff_id')->references('staff_id')->on('staff');
        });
    }

    public function down()
    {
        Schema::dropIfExists('distribution');
    }
}

