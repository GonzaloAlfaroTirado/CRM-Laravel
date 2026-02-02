<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Empleado;
use App\Models\Proveedor;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
        try {
            $totalClientes = Cliente::count();
            $totalProductos = Producto::count();
            $totalEmpleados = Empleado::count();
            $totalProveedores = Proveedor::count();

            $valorInventario = Producto::sum(DB::raw('precio * stock'));
            $stockBajo = Producto::where('stock', '<', 10)->count();

        } catch (\Exception $e) {
            $totalClientes = 0; 
            $totalProductos = 0; 
            $totalEmpleados = 0; 
            $totalProveedores = 0;
            $valorInventario = 0;
            $stockBajo = 0;
        }

        return view('home', compact(
            'totalClientes', 
            'totalProductos', 
            'totalEmpleados', 
            'totalProveedores',
            'valorInventario',
            'stockBajo'
        ));
    })->name('home');

    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('categorias', CategoriaController::class);
    
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
    
    Route::get('/perfil/configuracion', [ProfileController::class, 'edit'])->name('profile.settings');
    
    Route::put('/perfil/configuracion', [ProfileController::class, 'update'])->name('profile.update');
});