<?php

namespace App\Http\Controllers;

use App\Models\InfAnioLectivo;
use Illuminate\Http\Request;

class InfAnioLectivoController extends Controller
{
    const PAGINATION = 6;
    
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $anoslectivos = InfAnioLectivo::where('estado', '=', 'Activo')
            ->where(function($query) use ($buscarpor) {
                $query->where('nombre', 'like', '%'.$buscarpor.'%')
                      ->orWhere('estado', 'like', '%'.$buscarpor.'%');
            })
            ->paginate($this::PAGINATION);

        return view('ceinformacion.añoLectivo.registrar', compact('anoslectivos', 'buscarpor'));
    }
   
    public function store(Request $request)     
    {         
        // Validación consolidada
        $data = $request->validate([             
            'nombre' => 'required|max:100|min:4|unique:anoslectivos,nombre',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|in:Activo,Inactivo',
            'descripcion' => 'nullable|max:500'
        ], [             
            // Mensajes para nombre
            'nombre.required' => 'Ingrese el nombre del Año Lectivo',             
            'nombre.max' => 'El nombre no puede exceder los 100 caracteres',
            'nombre.min' => 'El nombre debe tener al menos 4 caracteres',
            'nombre.unique' => 'Ya existe un año lectivo con ese nombre',
            
            // Mensajes para fecha_inicio
            'fecha_inicio.required' => 'Ingrese la fecha de inicio del Año Lectivo',             
            'fecha_inicio.date' => 'Ingrese una fecha válida para el inicio',
            
            // Mensajes para fecha_fin
            'fecha_fin.required' => 'Ingrese la fecha de fin del Año Lectivo',             
            'fecha_fin.date' => 'Ingrese una fecha válida para el fin',
            'fecha_fin.after' => 'La fecha de fin debe ser posterior a la fecha de inicio',
            
            // Mensajes para estado
            'estado.required' => 'Seleccione el estado del Año Lectivo',             
            'estado.in' => 'El estado debe ser Activo o Inactivo',
            
            // Mensajes para descripcion
            'descripcion.max' => 'La descripción no puede exceder los 500 caracteres',
        ]);

        // Crear el nuevo año lectivo
        $anoslectivos = new InfAnioLectivo();
        $anoslectivos->nombre = $request->nombre;
        $anoslectivos->fecha_inicio = $request->fecha_inicio;
        $anoslectivos->fecha_fin = $request->fecha_fin;
        $anoslectivos->estado = $request->estado;
        $anoslectivos->descripcion = $request->descripcion;
        $anoslectivos->save();

        //return redirect()->route('aniolectivo.index')->with('success', 'Año Lectivo guardado exitosamente!'); 
        }

}