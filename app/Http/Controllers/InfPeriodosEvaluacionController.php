<?php

namespace App\Http\Controllers;

use App\Models\InfPeriodosEvaluacion;
use Illuminate\Http\Request;

class InfPeriodosEvaluacionController extends Controller
{
    const PAGINATION = 6;
    
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $periodosEvaluacion = InfPeriodosEvaluacion::where(function($query) use ($buscarpor) {
                $query->where('nombre', 'like', '%'.$buscarpor.'%')
                      ->orWhere('estado', 'like', '%'.$buscarpor.'%');
            })
            ->orderBy('ano_lectivo_id', 'desc')
            ->orderBy('fecha_inicio', 'asc')
            ->paginate($this::PAGINATION);

        return view('ceinformacion.periodosEvaluacion.registrar', compact('periodosEvaluacion', 'buscarpor'));
    }
   
    public function store(Request $request)     
    {         
        // Validación consolidada
        $data = $request->validate([             
            'ano_lectivo_id' => 'required|integer|exists:anoslectivos,ano_lectivo_id',
            'nombre' => 'required|max:100|min:5',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|in:Planificado,En curso,Finalizado,Cerrado',
            'es_final' => 'required|boolean'
        ], [             
            // Mensajes para ano_lectivo_id
            'ano_lectivo_id.required' => 'Seleccione el Año Lectivo',             
            'ano_lectivo_id.integer' => 'El Año Lectivo debe ser válido',
            'ano_lectivo_id.exists' => 'El Año Lectivo seleccionado no existe',
            
            // Mensajes para nombre
            'nombre.required' => 'Ingrese el nombre del periodo',             
            'nombre.max' => 'El nombre no puede exceder los 100 caracteres',
            'nombre.min' => 'El nombre debe tener al menos 5 caracteres',
            
            // Mensajes para fecha_inicio
            'fecha_inicio.required' => 'Ingrese la fecha de inicio del periodo',             
            'fecha_inicio.date' => 'Ingrese una fecha válida para el inicio',
            
            // Mensajes para fecha_fin
            'fecha_fin.required' => 'Ingrese la fecha de fin del periodo',             
            'fecha_fin.date' => 'Ingrese una fecha válida para el fin',
            'fecha_fin.after' => 'La fecha de fin debe ser posterior a la fecha de inicio',
            
            // Mensajes para estado
            'estado.required' => 'Seleccione el estado del periodo',             
            'estado.in' => 'El estado debe ser: Planificado, En curso, Finalizado o Cerrado',
            
            // Mensajes para es_final
            'es_final.required' => 'Indique si es evaluación final',             
            'es_final.boolean' => 'El campo es final debe ser verdadero o falso'
        ]);

        // Validación adicional: No puede haber dos periodos finales activos en el mismo año lectivo
        if ($request->es_final == 1) {
            $periodoFinalExistente = InfPeriodosEvaluacion::where('ano_lectivo_id', $request->ano_lectivo_id)
                ->where('es_final', true)
                ->whereIn('estado', ['Planificado', 'En curso'])
                ->exists();
                
            if ($periodoFinalExistente) {
                return redirect()->back()
                    ->withErrors(['es_final' => 'Ya existe un periodo final activo para este año lectivo'])
                    ->withInput();
            }
        }

        // Validación: No puede haber solapamiento de fechas en el mismo año lectivo
        $solapamiento = InfPeriodosEvaluacion::where('ano_lectivo_id', $request->ano_lectivo_id)
            ->where(function($query) use ($request) {
                $query->whereBetween('fecha_inicio', [$request->fecha_inicio, $request->fecha_fin])
                    ->orWhereBetween('fecha_fin', [$request->fecha_inicio, $request->fecha_fin])
                    ->orWhere(function($subQuery) use ($request) {
                        $subQuery->where('fecha_inicio', '<=', $request->fecha_inicio)
                            ->where('fecha_fin', '>=', $request->fecha_fin);
                    });
            })
            ->exists();

        if ($solapamiento) {
            return redirect()->back()
                ->withErrors(['fecha_inicio' => 'Las fechas se solapan con otro periodo existente'])
                ->withInput();
        }

        // Crear el nuevo periodo de evaluación
        $periodosEvaluacion = new InfPeriodosEvaluacion();
        $periodosEvaluacion->ano_lectivo_id = $request->ano_lectivo_id;
        $periodosEvaluacion->nombre = $request->nombre;
        $periodosEvaluacion->fecha_inicio = $request->fecha_inicio;
        $periodosEvaluacion->fecha_fin = $request->fecha_fin;
        $periodosEvaluacion->estado = $request->estado;
        $periodosEvaluacion->es_final = $request->es_final;
        $periodosEvaluacion->save();

        //return redirect()->route('periodosevaluacion.index')->with('success', 'Periodo de Evaluación guardado exitosamente!'); 
        }
}