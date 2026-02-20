<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Añadir columna role a users
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('usuario')->after('password'); // 'admin' o 'usuario'
        });

        // Añadir foto a clientes
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('direccion');
            $table->string('empresa')->nullable()->after('nombre');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->dropColumn('empresa');
        });
    }
};
