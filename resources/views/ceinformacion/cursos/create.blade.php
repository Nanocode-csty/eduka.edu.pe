@extends('cplantilla.bprincipal')
@section('titulo','Crear Curso')

@section('contenidoplantilla') 
<div class="container">
    <h1>Registrar Nuevo Curso</h1>
    <hr>
    <form method="POST" action="{{ route('registrarcurso.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="grado_id">Grado</label>
                <select class="form-control @error('grado_id') is-invalid @enderror" id="grado_id" name="grado_id">
                    <option value="">Seleccione un grado</option>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->grado_id }}">{{ $grado->descripcion }}</option>
                    @endforeach
                </select>
                @error('grado_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>                
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="seccion_id">Sección</label>
                <select class="form-control @error('seccion_id') is-invalid @enderror" id="seccion_id" name="seccion_id">
                    <option value="">Seleccione una sección</option>
                    @foreach($secciones as $seccion)
                        <option value="{{ $seccion->seccion_id }}">{{ $seccion->nombre }}</option>
                    @endforeach
                </select>
                @error('seccion_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>                
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ano_lectivo_id">Año Lectivo</label>
                <select class="form-control @error('ano_lectivo_id') is-invalid @enderror" id="ano_lectivo_id" name="ano_lectivo_id">
                    <option value="">Seleccione un año lectivo</option>
                    @foreach($aniosLectivos as $anio)
                        <option value="{{ $anio->ano_lectivo_id }}">{{ $anio->nombre }}</option>
                    @endforeach
                </select>
                @error('ano_lectivo_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>                
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="aula_id">Aula</label>
                <select class="form-control" id="aula_id" name="aula_id">
                    <option value="">Seleccione un aula</option>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->aula_id }}">{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="profesor_principal_id">Profesor Principal</label>
                <select class="form-control" id="profesor_principal_id" name="profesor_principal_id">
                    <option value="">Seleccione un profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->profesor_id }}">{{ $profesor->nombres }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cupo_maximo">Cupo Máximo</label>
                <input type="number" class="form-control @error('cupo_maximo') is-invalid @enderror" id="cupo_maximo" name="cupo_maximo" value="30">
                @error('cupo_maximo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>                
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="estado">Estado</label>
                <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                    <option value="" disabled selected>Seleccione un estado</option>
                    <option value="En Planificación">En Planificación</option>
                    <option value="Disponible">Disponible</option>
                    <option value="Completo">Completo</option>
                    <option value="En Curso">En Curso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
                @error('estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>                
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
        <a href="{{ route('registrarcurso.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection
