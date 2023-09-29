<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\EntradaPromocion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EntradasExport;


class EntradaPromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $entradas_promociones = EntradaPromocion::all();
        return view('entradas-promociones.index', ['entradas_promociones' => $entradas_promociones]);
        */
        $entradas_promociones = EntradaPromocion::all();
        return view('entradas-promociones.index', ['entradas_promociones' => $entradas_promociones]);

    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entradas-promociones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validación de los datos ingresados en el formulario
                $request->validate([
                    'nombre' => 'required|string|max:255',
                    'descripcion' => 'required|string',
                    'fecha_inicio' => 'required|date',
                    'fecha_fin' => 'required|date',
                    'precio' => 'required|numeric',
                ]);
        
                // Crear una nueva instancia del modelo EntradasPromociones
                $entradaPromocion = new EntradaPromocion();
        
                // Asignar valores a los atributos del modelo a partir de los datos del formulario
                $entradaPromocion->nombre = $request->input('nombre');
                $entradaPromocion->descripcion = $request->input('descripcion');
                $entradaPromocion->fecha_inicio = $request->input('fecha_inicio');
                $entradaPromocion->fecha_fin = $request->input('fecha_fin');
                $entradaPromocion->precio = $request->input('precio');
        
                // Guardar el nuevo registro en la base de datos
                $entradaPromocion->save();
        
                // Redireccionar a la página de confirmación o a la lista de entradas/promociones
                return view('entradas-promociones.create')->with('success', 'Entrada/Promoción registrada exitosamente');
            
    }
    public function edit($id)
    {
        $entradas_promociones = EntradaPromocion::findOrFail($id); // Encuentra la limpieza por ID

        return view('entradas-promociones.edit', compact('entradas_promociones'));
    }

    public function update(Request $request, $id)
    {
        // Validación y lógica de actualización aquí...

        $entradas_promociones = EntradaPromocion::find($id); // Encuentra el modelo por ID

        if ($entradas_promociones) {
            // Actualiza los campos del modelo
            $entradas_promociones->nombre = $request->input('nombre');
            $entradas_promociones->descripcion = $request->input('descripcion');
            $entradas_promociones->fecha_inicio = $request->input('fecha_inicio');
            $entradas_promociones->fecha_fin = $request->input('fecha_fin');
            $entradas_promociones->precio = $request->input('precio');
            // Otros campos a actualizar

            // Guarda los cambios en la base de datos
            $entradas_promociones->save();

            return redirect()->route('entradas-promociones.index')->with('success', 'Limpieza actualizada exitosamente');
        } else {
            // Manejar el caso en el que el registro no se encuentra
            return redirect()->route('entradas-promociones.index')->with('error', 'Limpieza no encontrada');
        }
    }

    public function destroy($id)
    {
        $entrada = EntradaPromocion::find($id);

        if ($entrada) {
            $entrada->delete();

            return redirect()->route('entradas-promociones.index')->with('success', 'Distribucion eliminada exitosamente');
        } else {
            return redirect()->route('entradas-promociones.index')->with('error', 'Distribucion no encontrada');
        }
    }
    public function exportExcel()
    {
        return Excel::download(new EntradasExport, 'limpiezas.xlsx');
        //return Excel::download(new LimpiezaExport, 'limpiezas.xlsx');

    }

}
