<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->string('recipient_NIK', 17)->primary();
            $table->string('recipient_name', 50)->nullable();
            $table->string('recipient_address', 100)->nullable();
            $table->string('recipient_contact', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipients');
    }
}
