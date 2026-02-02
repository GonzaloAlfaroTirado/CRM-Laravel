<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $totalEmpleados = Empleado::count();

        $valorInventario = Producto::sum(DB::raw('precio * stock'));

        $totalProveedores = Proveedor::count();

        $stockBajo = Producto::where('stock', '<', 10)->count();

        return view('home', compact(
            'totalEmpleados', 
            'valorInventario', 
            'totalProveedores', 
            'stockBajo'
        ));
    }
}