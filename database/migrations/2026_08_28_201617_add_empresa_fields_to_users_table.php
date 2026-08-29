<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('empresa_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('bodega_id')->nullable()->constrained()->nullOnDelete();
            $table->string('rol')->default('Usuario');
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['bodega_id']);
            $table->dropColumn(['empresa_id', 'bodega_id', 'rol', 'estado']);
        });
    }
};