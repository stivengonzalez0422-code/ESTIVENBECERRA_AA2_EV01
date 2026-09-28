<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('id_usuario', true);
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('cedula', 20)->unique();
            $table->date('fecha_nacimiento');
            $table->string('correo', 150)->unique();
            $table->string('contraseña', 255);
            $table->string('telefono', 20)->nullable();
            $table->dateTime('fecha_registro')->useCurrent();
            $table->boolean('estado')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
