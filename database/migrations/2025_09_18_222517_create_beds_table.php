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
        Schema::create('beds', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // FK al piso-servicio (UUID)
            $table->uuid('hospital_floor_service_id');
            $table->foreign('hospital_floor_service_id')
                ->references('id')->on('hospital_floor_services')
                ->onDelete('cascade');

            // Código único de cama
            $table->string('code', 50)->unique();

            // Estado
            $table->enum('status', ['Disponible','Ocupada'])
                ->default('Disponible');

            // Notas
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index('hospital_floor_service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beds');
    }
};
