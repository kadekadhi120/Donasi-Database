<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->string('report_id', 10)->primary();
            $table->string('staff_id', 10)->nullable();
            $table->string('location_id', 10)->nullable();
            $table->text('report_description')->nullable();
            $table->date('report_date')->nullable();

            $table->foreign('staff_id')->references('staff_id')->on('staff');
            $table->foreign('location_id')->references('location_id')->on('locations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}

