<?php

namespace App\Http\Controllers;

use App\Imports\ProductosImportados;
use Illuminate\Http\Request;
use App\Models\ProductosOvi;
use Maatwebsite\Excel\Facades\Excel;

class PrincipalController extends Controller
{
    public function index()
    {
        $productos = ProductosOvi::all();
        return view('index', compact('productos'));
    }

    public function importar(Request $request)
    {
        $request->validate([
            'documento' => 'required|mimes:csv|max:2048'
        ]);

        try {
            $file = $request->file('documento');
            Excel::import(new ProductosImportados, $file);
            return redirect()->route('index');
        } catch (\Exception $e) {
            dd("Error");
        }
    }

    public function exportar()
    {
        dd("Todo");
    }
}
