<?php

namespace App\Http\Controllers;

use App\Models\Continente;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function mostrarFormularioPais($id = null)
    {
        $continentes = Continente::all();
        $pais = $id ? Pais::findOrFail($id) : null;
        return view('formP', compact('continentes', 'pais'));
    }

    function crearPais(Request $request)
    {
        Pais::Create([
            'nombre_pais' => $request->nombre_pais,
            'codigo_continente' => $request->codigo_continente
        ]);

        return redirect('/')->with('success', 'Pais agregado correctamente');
    }

    public function actualizarPais(Request $request, $id)
    {
        $request->validate([
            'nombre_pais' => 'required',
            'codigo_continente' => 'required'
        ]);

        $pais = Pais::findOrFail($id);
        $pais->update([
            'nombre_pais' => $request->nombre_pais,
            'codigo_continente' => $request->codigo_continente,
        ]);

        return redirect('/')->with('success', 'País actualizado correctamente');
    }

    public function eliminarPais($id)
    {
        Pais::destroy($id);
        return redirect('/')->with('success', 'País eliminado correctamente');
    }
}
