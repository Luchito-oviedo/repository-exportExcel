<?php

namespace App\Imports;

use App\Models\ProductosOvi;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImportados implements ToModel
{
    /**
     * @param array $row
     * 
     * @return \Illiminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ProductosOvi([
            'nombre' => $row[0],
            'descripcion' => $row[1],
            'precio' => $row[2]
        ]);
    }
    
}
