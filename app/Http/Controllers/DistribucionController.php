<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribucion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistribucionExport;

class DistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribuciones = Distribucion::all();
        return view('distribuciones.index', ['distribuciones' => $distribuciones]);
    }
    
   
    public function store(Request $request)
    {
        // Validación de los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'fecha_entrega' => 'required|date',
            'proveedor' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'tamano_cisterna' => 'required|integer',
        ]);

        // Crear una nueva instancia del modelo Distribucion
        $distribucion = new Distribucion();

        // Asignar valores a los atributos del modelo a partir de los datos del formulario
        $distribucion->nombre = $request->input('nombre');
        $distribucion->cantidad = $request->input('cantidad');
        $distribucion->fecha_entrega = $request->input('fecha_entrega');
        $distribucion->proveedor = $request->input('proveedor');
        $distribucion->destino = $request->input('destino');
        $distribucion->tamano_cisterna = $request->input('tamano_cisterna');

        // Guardar el nuevo registro en la base de datos
        $distribucion->save();


        // Redirigir a la página de listado de tareas de Distribucion
        //return redirect()->route('Distribucion.index')->with('success', 'La tarea de Distribucion se ha creado con éxito.');
        return view('distribuciones.create')->with('success', 'La tarea de Distribucion se ha creado con éxito.');
    }



    public function create()
    {
        return view('distribuciones.create');
    }

    public function edit($id)
    {
        $distribucion = Distribucion::findOrFail($id); // Encuentra la Distribucion por ID

        return view('distribuciones.edit', compact('distribucion'));
    }

    public function update(Request $request, $id)
    {
        // Validación y lógica de actualización aquí...

        $distribucion = Distribucion::find($id); // Encuentra el modelo por ID

        if ($distribucion) {
            // Actualiza los campos del modelo
            $distribucion->nombre = $request->input('nombre');
            $distribucion->cantidad = $request->input('cantidad');
            $distribucion->fecha_entrega = $request->input('fecha_entrega');
            $distribucion->proveedor = $request->input('proveedor');
            $distribucion->destino = $request->input('destino');
            $distribucion->tamano_cisterna = $request->input('tamano_cisterna');
            // Otros campos a actualizar

            // Guarda los cambios en la base de datos
            $distribucion->save();

            return redirect()->route('distribuciones.index')->with('success', 'Distribucion actualizada exitosamente');
        } else {
            // Manejar el caso en el que el registro no se encuentra
            return redirect()->route('distribuciones.index')->with('error', 'Distribucion no encontrada');
        }
    }

    public function destroy($id)
    {
        $distribucion = Distribucion::find($id);

        if ($distribucion) {
            $distribucion->delete();

            return redirect()->route('distribuciones.index')->with('success', 'Distribucion eliminada exitosamente');
        } else {
            return redirect()->route('distribuciones.index')->with('error', 'Distribucion no encontrada');
        }
    }
    public function exportExcel()
    {
        return Excel::download(new DistribucionExport, 'limpiezas.xlsx');
        //return Excel::download(new LimpiezaExport, 'limpiezas.xlsx');

    }

}
