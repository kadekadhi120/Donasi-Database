<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTable extends Migration
{
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->string('distribution_id', 10)->unique();
            $table->string('need_id', 10)->nullable();
            $table->string('volunteer_id', 10)->nullable();
            $table->string('staff_id', 10)->nullable();
            $table->string('link', 255);
            $table->string('deskripsi', 255)->nullable();
            $table->date('distribution_date')->nullable();
            

            $table->foreign('need_id')->references('need_id')->on('needs')->onDelete('cascade');
            $table->foreign('volunteer_id')->references('volunteer_id')->on('volunteers')->onDelete('cascade');
            $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributions');
    }
}

