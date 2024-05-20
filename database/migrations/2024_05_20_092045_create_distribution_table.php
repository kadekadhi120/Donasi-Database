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
            $table->string('recipient_NIK', 17)->nullable();
            $table->string('report_id', 10)->nullable();
            $table->date('distribution_date')->nullable();

            $table->foreign('need_id')->references('need_id')->on('needs');
            $table->foreign('recipient_NIK')->references('recipient_NIK')->on('recipients');
            $table->foreign('report_id')->references('report_id')->on('report');
        });
    }

    public function down()
    {
        Schema::dropIfExists('distribution');
    }
}
