<?php

namespace App\Http\Controllers;
use App\Models\InfAula;

use Illuminate\Http\Request;

class InfAulaController extends Controller
{
   const PAGINATION = 6;

    public function index(Request $request)

    {
    $buscarpor = $request->get('buscarpor');

    $aulas = InfAula::where('nombre', 'like', '%' . $buscarpor . '%')
        ->orWhere('ubicacion', 'like', '%' . $buscarpor . '%')
        ->orWhere('tipo', 'like', '%' . $buscarpor . '%')
        ->orWhere('capacidad', 'like', '%' . $buscarpor . '%')
        ->paginate(self::PAGINATION);

    return view('ceinformacion.aulas.registrar', compact('aulas', 'buscarpor'));
    }
}