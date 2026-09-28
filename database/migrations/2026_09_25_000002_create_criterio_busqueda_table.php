<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('criterio_busqueda', function (Blueprint $table) {
            $table->integer('id_criterio', true);
            $table->integer('id_usuario');
            $table->string('destino', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('precio_maximo', 12, 2);
            $table->string('horario', 100)->nullable();
            $table->text('preferencias')->nullable();
            $table->dateTime('fecha_creacion')->useCurrent();
            $table->boolean('estado')->default(true);

            $table->foreign('id_usuario', 'fk_criterio_usuario')
                ->references('id_usuario')
                ->on('usuario');
        });

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement(
                'ALTER TABLE criterio_busqueda ADD CONSTRAINT chk_precio_criterio CHECK (precio_maximo >= 0)'
            );
            DB::statement(
                'ALTER TABLE criterio_busqueda ADD CONSTRAINT chk_fechas_criterio CHECK (fecha_fin >= fecha_inicio)'
            );
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('criterio_busqueda');
    }
};
