<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('staff_id', 10)->primary();
            $table->string('satff_name', 50)->nullable();
            $table->string('satff_address', 100)->nullable();
            $table->string('satff_contact', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
