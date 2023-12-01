<?php
// app/Exports/DatosExport.php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class DatosExport implements FromCollection
{
    protected $datos;

    public function __construct($datos)
    {
        // Convierte $datos en una instancia de Collection
        $this->datos = collect($datos);
    }

    public function collection()
    {
        // Retorna la colección de datos que deseas exportar
        return $this->datos;
    }
}

