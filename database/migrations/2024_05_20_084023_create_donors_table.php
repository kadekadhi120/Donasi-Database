<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->string('donor_NIK', 17)->primary();
            $table->string('donor_name', 255)->nullable();
            $table->string('donor_address', 255)->nullable();
            $table->string('donor_contact', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
