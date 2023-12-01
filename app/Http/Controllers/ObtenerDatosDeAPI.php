<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatosExport; // Asegúrate de tener una clase DatosExport


class ObtenerDatosDeAPI extends Controller
{
    public function obtenerDatosDeAPI()
    {
        $url = 'http://localhost/Prueba-seleccion/clientes-main/';
        $datos = json_decode(file_get_contents($url), true);

        // Paginar los datos
        $perPage = 10;
        $currentPage = Paginator::resolveCurrentPage('page');
        $currentItems = array_slice($datos, ($currentPage - 1) * $perPage, $perPage);
        $paginatedData = new LengthAwarePaginator($currentItems, count($datos), $perPage, $currentPage, ['path' => Request::url()]);

        return view('mostrarDatos', ['datos' => $paginatedData]);
    }

    public function exportarDatos()
    {
        $url = 'http://localhost/Prueba-seleccion/clientes-main/';
        $datos = json_decode(file_get_contents($url), true);
        try {
            return Excel::download(new DatosExport($datos), public_path('exports/datos_exportados.xlsx'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
