<?php

namespace App\Http\Controllers;

use App\Models\InfAsignatura;
use Illuminate\Http\Request;

class InfAsignaturaController extends Controller
{
    const PAGINATION = 6;
    
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $asignaturas = InfAsignatura::where('nombre', 'like', '%'.$buscarpor.'%')
                                   ->orWhere('codigo', 'like', '%'.$buscarpor.'%')
                                   ->paginate($this::PAGINATION);

        return view('ceinformacion.asignaturas.registrar', compact('asignaturas', 'buscarpor'));
    }
}