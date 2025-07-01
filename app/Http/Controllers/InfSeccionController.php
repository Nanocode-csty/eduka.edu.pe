<?php

namespace App\Http\Controllers;

use App\Models\InfSeccion;
use Illuminate\Http\Request;

class InfSeccionController extends Controller
{
    const PAGINATION = 6;

    public function index()
    {
        $seccion = InfSeccion::where('estado', '=', 'Activo')->paginate($this::PAGINATION);
        return view('ceinformacion.secciones.registrar', compact('seccion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=request()->validate([
            'nombreSeccion' => 'required|max:100|min:4'
        ], [
            'nombreSeccion.required' => 'Ingrese el Nombre de la Sección',
            'nombreSeccion.max' => 'Ingrese un nombre correcto',
            'nombreSeccion.min' => 'Ingrese un nombre correcto'
        ]);

        $data=request()->validate([
            'capacidadMaximaSeccion' => 'required|integer'
        ], [
            'capacidadMaximaSeccion.required' => 'Ingrese la Capacidad Máxima de la Sección',
            'capacidadMaximaSeccion.integer' => 'Ingrese un número correcto'
        ]);

        $data=request()->validate([
            'descripcionSeccion' => 'required|max:255|min:4'
        ], [
            'descripcionSeccion.required' => 'Ingrese la Descripción de la Sección',
            'descripcionSeccion.max' => 'Ingrese una descripción correcta',
            'descripcionSeccion.min' => 'Ingrese una descripción correcta'
        ]);

        $seccion = new InfSeccion();

        $seccion->nombre = $request->input('nombreSeccion');
        $seccion->capacidad_maxima = $request->input('capacidadMaximaSeccion');
        $seccion->descripcion = $request->input('descripcionSeccion');
        $seccion->estado = 'Activo';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
