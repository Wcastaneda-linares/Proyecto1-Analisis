<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\RecursoHumano;

class RecursosHumanosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RecursoHumano::all();
    }

        /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Cargo',
            'Salario',
            'Fecha de Contratación',
            'Fecha de Creación',
            'Última Actualización',
        ];
    }
}
