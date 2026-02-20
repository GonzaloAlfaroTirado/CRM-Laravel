<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('buscar');

        $productos = Producto::with(['categoria', 'proveedor'])
            ->when($busqueda, fn($q) => $q->where('nombre', 'like', "%{$busqueda}%"))
            ->paginate(10);

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.create', compact('categorias', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedors,id',
            'imagen'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pdf'          => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->except(['imagen', 'pdf']);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos/imagenes', 'public');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('productos/pdfs', 'public');
        }

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::with(['categoria', 'proveedor'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto    = Producto::findOrFail($id);
        $categorias  = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto', 'categorias', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedors,id',
            'imagen'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pdf'          => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->except(['imagen', 'pdf']);

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) Storage::disk('public')->delete($producto->imagen);
            $data['imagen'] = $request->file('imagen')->store('productos/imagenes', 'public');
        }

        if ($request->hasFile('pdf')) {
            if ($producto->pdf) Storage::disk('public')->delete($producto->pdf);
            $data['pdf'] = $request->file('pdf')->store('productos/pdfs', 'public');
        }

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->imagen) Storage::disk('public')->delete($producto->imagen);
        if ($producto->pdf)    Storage::disk('public')->delete($producto->pdf);

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
