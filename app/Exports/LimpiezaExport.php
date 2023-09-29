<?php

namespace App\Exports;

use App\Models\Limpieza;
use Maatwebsite\Excel\Concerns\FromCollection;

class LimpiezaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Limpieza::all();
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
            'Fecha de Realización',
            'Fecha de Creación',
            'Última Actualización',
        ];
    }
}
