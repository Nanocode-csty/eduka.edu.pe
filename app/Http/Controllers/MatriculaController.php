<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\InfEstudiante;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    const PAGINATION = 7;
    
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $matricula = Matricula::with(['estudiante'])
            ->where('numero_matricula', 'like', '%' . $buscarpor . '%')
            ->paginate($this::PAGINATION);

        return view('cmatricula.registrar', compact('matricula', 'buscarpor'));
    }
   
    public function create()     
    {         
        // Obtener estudiantes activos para el select
        $estudiantes = InfEstudiante::where('estado', 'Activo')->get();
        return view('cmatricula.nuevo', compact('estudiantes'));     
    }

    public function store(Request $request)     
    {         
        $data = request()->validate([
            'estudianteId' => 'required|exists:estudiantes,estudiante_id',
            'cursoId' => 'required|integer',
            'numeroMatricula' => 'required|string|max:20|unique:matriculas,numero_matricula',
            'fechaMatricula' => 'required|date',
            'observaciones' => 'nullable|string|max:500',
        ], [
            'estudianteId.required' => 'Seleccione un estudiante',
            'estudianteId.exists' => 'El estudiante seleccionado no existe',
            
            'cursoId.required' => 'Seleccione un curso',
            'cursoId.integer' => 'Seleccione un curso válido',
            
            'numeroMatricula.required' => 'Ingrese el número de matrícula',
            'numeroMatricula.unique' => 'Este número de matrícula ya está registrado',
            'numeroMatricula.max' => 'El número de matrícula es demasiado largo',
            
            'fechaMatricula.required' => 'Ingrese la fecha de matrícula',
            'fechaMatricula.date' => 'Ingrese una fecha válida',
            
            'observaciones.max' => 'Las observaciones son demasiado largas (máximo 500 caracteres)'
        ]);

        $numeroMatriculaBuscar = trim($request->numeroMatricula);

        // Verificar si ya existe una matrícula con ese número
        $matriculaRegistrada = Matricula::whereRaw('LOWER(TRIM(numero_matricula)) = ?', [strtolower($numeroMatriculaBuscar)])->first();

        if ($matriculaRegistrada) {
            return back()->withErrors([
                'numeroMatricula' => 'Este número de matrícula ya está registrado.',
            ])->withInput();
        }

        // Crear nueva matrícula
        $matricula = new Matricula();
        $matricula->estudiante_id = $request->estudianteId;
        $matricula->curso_id = $request->cursoId;
        $matricula->numero_matricula = $numeroMatriculaBuscar;
        $matricula->fecha_matricula = $request->fechaMatricula;
        $matricula->estado = 'Pre-inscrito';
        $matricula->observaciones = $request->observaciones;
        $matricula->usuario_registro = 1; // Usuario por defecto
        $matricula->save();

        return redirect()
            ->route('matriculas.index')
            ->with('success', 'Matrícula registrada satisfactoriamente');
    }
    
    public function verificarNumeroMatricula(Request $request)
    {
        $numeroMatricula = $request->query('numero_matricula');
        $existe = Matricula::where('numero_matricula', $numeroMatricula)->exists();
        return response()->json(['existe' => $existe]);
    }

    public function show($id)
    {
        $matricula = Matricula::with(['estudiante'])->findOrFail($id);
        return view('cmatricula.mostrar', compact('matricula'));
    }

    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);
        $estudiantes = InfEstudiante::where('estado', 'Activo')->get();
        return view('cmatricula.editar', compact('matricula', 'estudiantes'));
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        
        $data = request()->validate([
            'estudianteId' => 'required|exists:estudiantes,estudiante_id',
            'cursoId' => 'required|integer',
            'numeroMatricula' => 'required|string|max:20|unique:matriculas,numero_matricula,' . $id . ',matricula_id',
            'fechaMatricula' => 'required|date',
            'estado' => 'required|in:Pre-inscrito,Matriculado,Anulado,Finalizado',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $matricula->update([
            'estudiante_id' => $request->estudianteId,
            'curso_id' => $request->cursoId,
            'numero_matricula' => trim($request->numeroMatricula),
            'fecha_matricula' => $request->fechaMatricula,
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()
            ->route('matriculas.index')
            ->with('success', 'Matrícula actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        try {
            $matricula = Matricula::findOrFail($id);
            
            // Verificar si la matrícula puede ser eliminada
            if ($matricula->estado == 'Matriculado') {
                return redirect()
                    ->route('matriculas.index')
                    ->with('error', 'No se puede eliminar una matrícula con estado "Matriculado"');
            }
            
            $numeroMatricula = $matricula->numero_matricula;
            $matricula->delete();
            
            return redirect()
                ->route('matriculas.index')
                ->with('success', "Matrícula N° {$numeroMatricula} eliminada satisfactoriamente");
                
        } catch (\Exception $e) {
            return redirect()
                ->route('matriculas.index')
                ->with('error', 'Error al eliminar la matrícula: ' . $e->getMessage());
            }
        }
}