<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Distribucion;

class DistribucionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Distribucion::all();
    }
    
            /**
        * @return array
        */
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Cantidad',
            'Fecha de Entrega',
            'Proveedor',
            'Destino',
            'Tamaño Cisterna',
            'Fecha de Creación',
            'Última Actualización',
        ];
    }
}
