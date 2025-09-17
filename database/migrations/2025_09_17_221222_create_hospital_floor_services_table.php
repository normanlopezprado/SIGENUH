<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospital_floor_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('hospital_floor_id');
            $table->uuid('service_id');
            $table->timestamps();
            $table->unique(['hospital_floor_id', 'service_id']);

            $table->foreign('hospital_floor_id')
                ->references('id')->on('hospital_floors')
                ->onDelete('cascade');

            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_floor_services');
    }
};
