<?php

namespace App\Http\Controllers;

use App\Models\InfGrado;
use App\Models\InfNivel;
use Illuminate\Http\Request;

class InfGradoController extends Controller
{
    const PAGINATION = 6;

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        
        $grados = InfGrado::join('niveleseducativos', 'grados.nivel_id', '=', 'niveleseducativos.nivel_id')
                  ->select('grados.*', 'niveleseducativos.nombre as nivel_nombre')
                  ->where('grados.nombre', 'like', '%'.$buscarpor.'%')
                  ->orWhere('grados.descripcion', 'like', '%'.$buscarpor.'%')
                  ->paginate(10);
        
        return view('ceinformacion.grados.registrar', compact('grados', 'buscarpor'));
    }
}