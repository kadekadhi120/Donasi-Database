<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_id', 17)->unique();
            $table->string('provinsi', 50)->nullable();
            $table->string('KabupatenKota', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('KelurahanDesa', 50)->nullable();
            $table->string('RTRW', 50)->nullable();
            $table->integer('total_KK')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
