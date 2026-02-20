<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            if (!Schema::hasColumn('empleados', 'cargo')) $table->string('cargo')->nullable();
        });

        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'precio')) $table->decimal('precio', 8, 2)->default(0);
            if (!Schema::hasColumn('productos', 'stock')) $table->integer('stock')->default(0);
            if (!Schema::hasColumn('productos', 'descripcion')) $table->text('descripcion')->nullable();
        });
        
        Schema::table('categorias', function (Blueprint $table) {
            if (!Schema::hasColumn('categorias', 'descripcion')) $table->text('descripcion')->nullable();
        });
        
        Schema::table('proveedors', function (Blueprint $table) {
            if (!Schema::hasColumn('proveedors', 'telefono')) $table->string('telefono')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
