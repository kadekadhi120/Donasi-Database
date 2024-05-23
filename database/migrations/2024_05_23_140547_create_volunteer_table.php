<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerTable extends Migration
{
    public function up(): void
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->string('volunteer_id', 17)->primary();
            $table->string('volunteer_name', 50);
            $table->string('volunteer_address', 100)->nullable();
            $table->string('volunteer_contact', 20)->nullable();
            
            // Timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
}
