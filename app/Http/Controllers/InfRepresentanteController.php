<?php

namespace App\Http\Controllers;

use App\Models\InfEstudianteRepresentante;
use App\Models\InfRepresentante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InfRepresentanteController extends Controller
{
    public function exportarPDF()
    {
    // Obtener todos los representantes sin paginar (o lo que necesites)
    $representante = InfRepresentante::all();

    $pdf = Pdf::loadView('ceinformacion.representantes.pdf', compact('representante'))->setPaper('A4', 'portrait');

    // Mostrar en navegador
    return $pdf->stream('representantes_legales.pdf');

    // para descargarlo inmediatamente
    //return $pdf->download('representantes_legales.pdf');
    }
    
    
    
    
    const PAGINATION = 6;
    
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $representante=InfRepresentante::where('dni','like','%'.$buscarpor.'%')->orwhere('apellidoPaterno','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);

        return view('ceinformacion.representantes.registrar',compact('representante','buscarpor'));
    }
   
    public function store(Request $request)     
    {         
        $data=request()->validate([             
            'dniEstudiante'=>'required|max:8|min:8'
        ],         
        [             
            'dniEstudiante.required'=>'Ingrese el DNI del Estudiante',             
            'dniEstudiante.max'=>'Ingrese un DNI correcto',
            'dniEstudiante.min'=>'Ingrese un DNI correcto'
        ]);

        $data=request()->validate([             
            'nombreEstudiante'=>'required|max:100|min:4'
        ],         
        [             
            'nombreEstudiante.required'=>'Ingrese el Nombre del Estudiante',             
            'nombreEstudiante.max'=>'Ingrese un nombre correcto',
            'nombreEstudiante.min'=>'Ingrese un nombre correcto'
        ]);

        $data=request()->validate([             
            'apellidoEstudiante'=>'required|max:100|min:4'
        ],         
        [             
            'apellidoEstudiante.required'=>'Ingrese el Apellido del Estudiante',             
            'apellidoEstudiante.max'=>'Ingrese un apellido correcto',
            'apellidoEstudiante.min'=>'Ingrese un apellido correcto'
        ]);

        $data=request()->validate([             
            'fechaNacimientoEstudiante'=>'required|date'
        ],         
        [             
            'fechaNacimientoEstudiante.required'=>'Ingrese la fecha de nacimiento del Estudiante',             
            'fechaNacimientoEstudiante.date'=>'Ingrese un fecha correcta',
        ]);

        $data=request()->validate([             
            'generoEstudiante'=>'required|max:1|min:1'
        ],         
        [             
            'generoEstudiante.required'=>'Ingrese el genero del Estudiante',             
            'generoEstudiante.max'=>'Ingrese un genero correcto (M o F)',
            'generoEstudiante.min'=>'Ingrese un genero correcto (M o F)'
        ]);

        $data=request()->validate([             
            'direccionEstudiante'=>'required|max:255|min:20'
        ],         
        [             
            'direccionEstudiante.required'=>'Ingrese la direccion del Estudiante',             
            'direccionEstudiante.max'=>'Ingrese una direccion adecuada',
            'direccionEstudiante.min'=>'Ingrese una direccion adecuada'
        ]);

        $data = request()->validate([             
            'numeroCelularEstudiante' => 'required|numeric|between:900000000'
        ], [             
            'numeroCelularEstudiante.required' => 'Ingrese el numero de celular del estudiante',          
            'numeroCelularEstudiante.numeric' => 'El numero de celular debe ser valido',             
            'numeroCelularEstudiante.between' => 'El numero debe empezar en 9'
        ]);

        $data=request()->validate([             
            'correoEstudiante'=>'required|max:100|min:10'
        ],         
        [             
            'correoEstudiante.required'=>'Ingrese la direccion de correo del Estudiante',             
            'correoEstudiante.max'=>'Ingrese una direccion de correo adecuada',
            'correoEstudiante.min'=>'Ingrese una direccion de correo adecuada'
        ]);

        $data=request()->validate([             
            'estadoEstudiante'=>'required'
        ],         
        [             
            'estadoEstudiante.required'=>'Ingrese el estad del estudiante',
        ]);

        $data=request()->validate([             
            'fotoEstudiante'=>'required|max:255|min:20'
        ],         
        [             
            'fotoEstudiante.required'=>'Ingrese la URL de la foto del Estudiante',             
            'fotoEstudiante.max'=>'Ingrese una URL de correo adecuada',
            'fotoEstudiante.min'=>'Ingrese una URL de correo adecuada'
        ]);

        $data=request()->validate([             
            'observacionEstudiante'=>'required'
        ],         
        [             
            'observacionEstudiante.required'=>'Ingrese la observaciòn realizada',             
        ]);

        
        $representante=new InfRepresentante();

        $representante->dniEstudiante=$request->dniEstudiante;
        $representante->nombreEstudiante=$request->nombreEstudiante;
        $representante->apellidoEstudiante=$request->apellidoEstudiante;
        $representante->fechaNacimientoEstudiante=$request->fechaNacimientoEstudiante;
        $representante->generoEstudiante=$request->generoEstudiante;
        $representante->direccionEstudiante=$request->direccionEstudiante;
        $representante->numeroCelularEstudiante=$request->numeroCelularEstudiante;
        $representante->correoEstudiante=$request->correoEstudiante;
        $representante->fechaRegistroEstudiante=$request->fechaRegistroEstudiante;
        $representante->estadoEstudiante=$request->estadoEstudiante;
        $representante->fotoEstudiante=$request->fotoEstudiante;
        $representante->observacionEstudiante=$request->observacionEstudiante; 
        $representante->save();

        //return redirect()->route('producto.index')->with('datos','Producto Nuevo Guardado...!'); 
    }

    public function edit($dni)     
    {         
        $infRepresentante=InfRepresentante::findOrFail($dni);        
        return view('ceinformacion.estudianteRepresentante.registrar',compact('infRepresentante'));     
    }  

    public function buscarPorDni(Request $request)
    {
        $dni = $request->input('dni');

        $representante = InfRepresentante::where('dni', $dni)->first();

        if ($representante) {
            return response()->json([
                'success' => true,
                'representante' => $representante
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró ningún representante con ese DNI.'
            ]);
        }
    }

   public function asignarRepresentante(Request $request)     
{         
    $estudianteRepresentante = new InfEstudianteRepresentante();

    $estudianteRepresentante->estudiante_id = $request->input('idEstudiante');
    $estudianteRepresentante->representante_id = $request->input('idRepresentante');

    $estudianteRepresentante->save(); 

    return redirect()->route('registrarestudiante.index')
                    ->with([
                        'success' => 'Estudiante registrado y asignado a su Representante Legal satisfactoriamente'
                    ]);
}

}
