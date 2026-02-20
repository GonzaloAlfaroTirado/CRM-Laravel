<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Administrador
        User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Usuario estándar
        User::create([
            'name'     => 'Usuario Estándar',
            'email'    => 'usuario@crm.com',
            'password' => Hash::make('password'),
            'role'     => 'usuario',
        ]);
    }
}
