<?php

namespace App\Http\Controllers;

use App\Models\InfNivel;
use Illuminate\Http\Request;

class InfNivelController extends Controller
{
    const PAGINATION = 6;

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        
        $niveles = InfNivel::where('nombre', 'like', '%'.$buscarpor.'%')
                    ->orWhere('descripcion', 'like', '%'.$buscarpor.'%')
                    ->paginate(10);
        
        return view('ceinformacion.niveles.registrar', compact('niveles', 'buscarpor'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|max:50|min:2'
        ], [
            'nombre.required' => 'Ingrese el nombre del nivel educativo',
            'nombre.max' => 'El nombre es demasiado largo',
            'nombre.min' => 'El nombre es demasiado corto'
        ]);

        $data = $request->validate([
            'descripcion' => 'nullable|max:65535'
        ], [
            'descripcion.max' => 'La descripción es demasiado larga',
        ]);

        $nivel = new InfNivel();
        $nivel->nombre = $request->nombre;
        $nivel->descripcion = $request->descripcion;
        $nivel->save();

        return redirect()->route('nivel.index')->with('datos', 'Nivel educativo registrado exitosamente');
    }
}
