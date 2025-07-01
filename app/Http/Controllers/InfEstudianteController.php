<?php

namespace App\Http\Controllers;

use App\Models\InfEstudiante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InfEstudianteController extends Controller
{
   const PAGINATION = 7;

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');

        $estudiante = InfEstudiante::where(function($query) use ($buscarpor) {
            $query->where('dni', 'like', '%' . $buscarpor . '%')
                ->orWhere('apellidos', 'like', '%' . $buscarpor . '%');
        })
        ->where('estado', 'Activo')
        ->orderBy('apellidos', 'asc')
        ->paginate(self::PAGINATION);

        if ($request->ajax()) {
            return view('ceinformacion.estudiantes.estudiante', compact('estudiante'))->render();
        }

        return view('ceinformacion.estudiantes.registrar', compact('estudiante', 'buscarpor'));
    }

    public function create()     
    {         
        return view('ceinformacion.estudiantes.nuevo');     
    }

    public function store(Request $request)     
    {         
        $data = request()->validate([
            'dniEstudiante' => 'required|digits:8|unique:estudiantes,dni',
            'numeroCelularEstudiante' => ['required', 'digits:9'],
            'nombreEstudiante' => ['required', 'string', 'max:100', 'min:2'],
            'apellidoPaternoEstudiante' => ['required', 'string', 'max:100', 'min:2'],
            'apellidoMaternoEstudiante' => ['required', 'string', 'max:100', 'min:2'],
            'generoEstudiante' => ['required', 'in:M,F'],
            'fechaNacimientoEstudiante' => ['required', 'date', 'before:' . now()->subYears(5)->format('Y-m-d')],
            'regionEstudiante'=> ['required'],
            'provinciaEstudiante'=> ['required'],
            'distritoEstudiante'=> ['required'],
            'calleEstudiante'=> ['required', 'string', 'max:100', 'min:2'],
            'correoEstudiante' => 'required|email|max:100',

            'numeroEstudiante' => 'nullable|string|max:10',
            'urbanizacionEstudiante' => 'nullable|string|max:100',
            'referenciaEstudiante' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], [
            'dniEstudiante.required' => 'Ingrese N.° de DNI',
            'dniEstudiante.digits' => 'El DNI debe tener exactamente 8 dígitos.',
            'dniEstudiante.unique' => 'Este DNI ya está registrado.',

            'nombreEstudiante.required' => 'Ingrese nombre(s)',
            'nombreEstudiante.min' => 'Debe ingresar al menos 2 caracteres.',
            
            'apellidoPaternoEstudiante.required' => 'Ingrese apellido paterno.',
            'apellidoMaternoEstudiante.required' => 'Ingrese apellido materno.',

            'generoEstudiante.required' => 'Seleccione el género del estudiante.',
            'generoEstudiante.in' => 'Seleccione un género válido.',

            'fechaNacimientoEstudiante.required' => 'Ingrese la fecha de nacimiento.',
            'fechaNacimientoEstudiante.before' => 'La fecha de nacimiento no es válida.',

            'regionEstudiante.required' => 'Seleccione Región de procedencia',

            'provinciaEstudiante.required' => 'Seleccione Provincia de procedencia',

            'distritoEstudiante.required' => 'Seleccione Distrito de procedencia',

            'calleEstudiante.required' => 'Ingrese Avenida o Calle',
            'calleEstudiante.min' => 'Debe ingresar al menos 2 caracteres.',

            'numeroCelularEstudiante.required' => 'Ingrese N.° de celular',
            'numeroCelularEstudiante.digits' => 'El N.° debe tener exactamente 9 dígitos.',

            'correoEstudiante.required' => 'Ingrese la dirección de correo electrónico',             
            'correoEstudiante.email' => 'Ingrese una dirección de correo válida',
            'correoEstudiante.max' => 'La dirección de correo es demasiado larga'
        ]);

        $partesDireccion = array_filter([
            $request->calleEstudiante,
            $request->numeroEstudiante,
            $request->urbanizacionEstudiante,
            $request->distritoEstudiante,
            $request->provinciaEstudiante,
            $request->regionEstudiante,
            $request->referenciaEstudiante,
        ]);

        $dniBuscar = trim($request->dniEstudiante);

        // Buscar si ya existe un estudiante registrado con ese dni. TRIM: elimina espacios en blanco al inicio y al final
        $estudianteRegistrado = InfEstudiante::whereRaw('LOWER(TRIM(dni)) = ?', [strtolower($dniBuscar)])->first();

        if ($estudianteRegistrado) {

            return back()->withErrors([
            'dniEstudiante' => 'El estudiante ya está registrado.',
            ])->withInput();
        }

        $apellidoEstudiante = $request->apellidoPaternoEstudiante . " " . $request->apellidoMaternoEstudiante;
        $estudiante=new InfEstudiante();

        $estudiante->dni=$dniBuscar;
        $estudiante->nombres=$request->nombreEstudiante;
        $estudiante->apellidos=$apellidoEstudiante;
        $estudiante->fecha_nacimiento=$request->fechaNacimientoEstudiante;
        $estudiante->genero=$request->generoEstudiante;
        $estudiante->direccion=implode(', ', $partesDireccion);
        $estudiante->telefono=$request->numeroCelularEstudiante;
        $estudiante->email=$request->correoEstudiante;
        $estudiante->fecha_registro=now();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreFoto = $dniBuscar . '.' . $foto->getClientOriginalExtension();
            // Guarda en storage/app/public/fotos, disco 'public'
            $foto->storeAs('fotos', $nombreFoto, 'public');
            $estudiante->foto_url = $nombreFoto;
        }

        $estudiante->save();


        $estudiante = InfEstudiante::where('dni', $dniBuscar)->first();
                    
            if ($estudiante) {
                $idEstudiante = $estudiante->estudiante_id;
                $EstudianteAsignar = $estudiante->apellidos.' '.$estudiante->nombres;

                return redirect()->route('registrorepresentanteestudiante.index')
                    ->with([
                        
                        'idEstudiante' => $idEstudiante,
                        'dniBuscar' => $EstudianteAsignar,
                        'success' => 'Estudiante registrado satisfactoriamente'
                    ]);
            } else {
                return redirect()->back()->with('error', 'No se encontró al estudiante.');
            }



        /*
        return redirect()
            ->route('registrorepresentanteestudiante.index')
            ->with([
                'dniBuscar' => $dniBuscar,
                'success' => 'Estudiante registrado satisfactoriamente'
        ]);*/
        
    }
    
    public function verificarDni(Request $request)
    {
        $dni = $request->query('dni');
        $existe = InfEstudiante::where('dni', $dni)->exists();
        return response()->json(['existe' => $existe]);
    }

    public function generarFicha($id)
    {
        $estudiante = InfEstudiante::with('representante') // Asegúrate de tener relación definida
                                ->findOrFail($id);
        // Pasamos los datos a la vista PDF
        $pdf = Pdf::loadView('ceinformacion.estudiantes.ficha', compact('estudiante'));

        // Opcional: puedes poner un nombre personalizado
        return $pdf->stream('ficha_estudiante_'.$estudiante->dni.'.pdf');
    }

}
