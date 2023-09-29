<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Limpieza;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LimpiezaExport;



class LimpiezaController extends Controller
{

    public function index(){

        $limpiezas = Limpieza::all();
        return view('limpiezas.index', ['limpiezas' => $limpiezas]);
    }
   

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
        ]);

        // Crear una nueva tarea de limpieza
        $limpieza = new Limpieza();
        $limpieza->nombre = $request->input('nombre');
        $limpieza->descripcion = $request->input('descripcion');
        $limpieza->fecha_realizacion = $request->input('fecha');
        $limpieza->save();

        session()->flash('success', 'La tarea de limpieza se ha creado con éxito.');

        // Redirigir a la página de listado de tareas de limpieza
        //return redirect()->route('limpiezas.index')->with('success', 'La tarea de limpieza se ha creado con éxito.');
        return view('limpiezas.create')->with('success', 'La tarea de limpieza se ha creado con éxito.');
    }

    public function create()
    {
        return view('limpiezas.create');
    }

    public function edit($id)
    {
        $limpieza = Limpieza::findOrFail($id); // Encuentra la limpieza por ID

        return view('limpiezas.edit', compact('limpieza'));
    }

    public function update(Request $request, $id)
    {
        // Validación y lógica de actualización aquí...

        $limpieza = Limpieza::find($id); // Encuentra el modelo por ID

        if ($limpieza) {
            // Actualiza los campos del modelo
            $limpieza->nombre = $request->input('nombre');
            $limpieza->descripcion = $request->input('descripcion');
            // Otros campos a actualizar

            // Guarda los cambios en la base de datos
            $limpieza->save();

            return redirect()->route('limpiezas.index')->with('success', 'Limpieza actualizada exitosamente');
        } else {
            // Manejar el caso en el que el registro no se encuentra
            return redirect()->route('limpiezas.index')->with('error', 'Limpieza no encontrada');
        }
    }

    public function destroy($id)
    {
        $limpieza = Limpieza::find($id);

        if ($limpieza) {
            $limpieza->delete();

            return redirect()->route('limpiezas.index')->with('success', 'Limpieza eliminada exitosamente');
        } else {
            return redirect()->route('limpiezas.index')->with('error', 'Limpieza no encontrada');
        }
    }

    public function exportExcel()
    {
        return Excel::download(new LimpiezaExport, 'limpiezas.xlsx');
        //return Excel::download(new LimpiezaExport, 'limpiezas.xlsx');

    }


}
