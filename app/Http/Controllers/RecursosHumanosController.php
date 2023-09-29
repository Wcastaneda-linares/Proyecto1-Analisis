<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecursoHumano;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecursosHumanosExport;



class RecursosHumanosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recursos_humanos = RecursoHumano::all();
        return view('recursos-humanos.index', ['recursos_humanos' => $recursos_humanos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recursos-humanos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'fecha_contratacion' => 'required|date',
        ]);

        // Crear una nueva instancia del modelo EntradasPromociones
        $recursos_humanos = new RecursoHumano();

        // Asignar valores a los atributos del modelo a partir de los datos del formulario
        // Crear un nuevo objeto de empleado
        $recursos_humanos->nombre = $request->nombre;
        $recursos_humanos->cargo = $request->cargo;
        $recursos_humanos->salario = $request->salario;
        $recursos_humanos->fecha_contratacion = $request->fecha_contratacion;

        // Guardar el empleado en la base de datos
        $recursos_humanos->save();

        // Redireccionar a la página de confirmación o a la lista de entradas/promociones
        return view('recursos-humanos.create')->with('success', 'Entrada/Promoción registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recursos_humanos = RecursoHumano::findOrFail($id); // Encuentra la limpieza por ID

        return view('recursos-humanos.edit', compact('recursos_humanos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'fecha_contratacion' => 'required|date',
        ]);
    
        // Buscar el empleado por ID
        $recursos_humanos = RecursoHumano::find($id);
    
        if ($recursos_humanos) {
            // Actualizar los campos del recursos_humanos
            $recursos_humanos->nombre = $request->input('nombre');
            $recursos_humanos->cargo = $request->input('cargo');
            $recursos_humanos->salario = $request->input('salario');
            $recursos_humanos->fecha_contratacion = $request->input('fecha_contratacion');
    
            // Guardar los cambios en la base de datos
            $recursos_humanos->save();
    
            return redirect()->route('recursos-humanos.index')->with('success', 'Empleado actualizado exitosamente.');
        } else {
            // Manejar el caso en el que el empleado no se encuentra
            return redirect()->route('recursos-humanos.index')->with('error', 'Empleado no encontrado.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recursos_humanos = RecursoHumano::find($id);

        if ($recursos_humanos) {
            $recursos_humanos->delete();

            return redirect()->route('recursos-humanos.index')->with('success', 'Distribucion eliminada exitosamente');
        } else {
            return redirect()->route('recursos-humanos.index')->with('error', 'Distribucion no encontrada');
        }
    }

    public function exportExcel()
    {
        return Excel::download(new RecursosHumanosExport, 'recursosHumanos.xlsx');
        //return Excel::download(new LimpiezaExport, 'limpiezas.xlsx');

    }
}
