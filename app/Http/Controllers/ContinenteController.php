<?php

namespace App\Http\Controllers;

use App\Models\Continente;
use Illuminate\Http\Request;

class ContinenteController extends Controller
{
    function listarContinente()
    {
        $continentes = Continente::all();
        return view('welcome', compact('continentes'));
    }

    function crearContinente(Request $request)
    {

        $request->validate([
            'nombre_continente' => 'required',
        ]);

        Continente::Create([
            'nombre_continente' => $request->nombre_continente,
        ]);

        return redirect('/')->with('success', 'Continente agregado correctamente');
    }

    public function eliminarContinente($id)
    {
        Continente::destroy($id);
        return redirect('/')->with('success', 'Continente eliminado correctamente');
    }

    public function mostrarFormulario($id = null)
    {
        $continente = $id ? Continente::findOrFail($id) : null;
        return view('form', compact('continente'));
    }

    public function actualizarContinente(Request $request, $id)
    {
        $request->validate([
            'nombre_continente' => 'required',
        ]);

        $continente = Continente::findOrFail($id);
        $continente->nombre_continente = $request->nombre_continente;
        $continente->save();

        return redirect('/')->with('success', 'Continente actualizado correctamente');
    }
}
