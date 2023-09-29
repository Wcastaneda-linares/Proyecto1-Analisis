<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\EntradaPromocion;

class EntradasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EntradaPromocion::all();
    }

        /**
     * @return array
     */ 
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Descripción',
            'Fecha de Inicio',
            'Fecha de Fin',
            'Precio',
            'Fecha de Creación',
            'Última Actualización',
        ];
    }
}
