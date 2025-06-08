<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Pais;

class EstadoController extends Controller
{
    // Mostrar formulario para crear o editar un estado
    public function mostrarFormulario($id = null)
    {
        $paises = Pais::all();
        $estado = $id ? Estado::findOrFail($id) : null;

        return view('formE', compact('estado', 'paises'));
    }

    // Crear nuevo estado
    public function crearEstado(Request $request)
    {
        $request->validate([
            'nombre_estado' => 'required',
            'codigo_pais' => 'required',
        ]);

        // Obtener el país seleccionado para obtener su continente
        $pais = Pais::findOrFail($request->codigo_pais);

        Estado::create([
            'nombre_estado' => $request->nombre_estado,
            'codigo_pais' => $request->codigo_pais,
            'codigo_continente' => $pais->codigo_continente, // asignamos el continente desde el país
        ]);

        return redirect('/')->with('success', 'Estado creado correctamente');
    }


    // Actualizar un estado existente
    public function actualizarEstado(Request $request, $id)
    {
        $request->validate([
            'nombre_estado' => 'required',
            'codigo_pais' => 'required',
        ]);

        $pais = Pais::findOrFail($request->codigo_pais);

        $estado = Estado::findOrFail($id);
        $estado->update([
            'nombre_estado' => $request->nombre_estado,
            'codigo_pais' => $request->codigo_pais,
            'codigo_continente' => $pais->codigo_continente,
        ]);

        return redirect('/')->with('success', 'Estado actualizado correctamente');
    }


    // Eliminar un estado
    public function eliminarEstado($id)
    {
        Estado::destroy($id);
        return redirect('/')->with('success', 'Estado eliminado correctamente');
    }
}
