@extends('cplantilla.bprincipal')
@section('titulo','Editar Docentes')
@section('contenidoplantilla') 
<div class="container">
    <h1>Editar Curso</h1>
    <hr>
    <form method="POST" action="{{ route('registrarcurso.update', $curso->curso_id) }}">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="curso_id">Código</label>
                <input type="text" class="form-control" id="curso_id" value="{{ $curso->curso_id }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="grado_id">Grado</label>
                <select class="form-control @error('grado_id') is-invalid @enderror" id="grado_id" name="grado_id">
                    <option value="">Seleccione un grado</option>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->grado_id }}" {{ $curso->grado_id == $grado->grado_id ? 'selected' : '' }}>
                            {{ $grado->nombre }}
                        </option>
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
                        <option value="{{ $seccion->seccion_id }}" {{ $curso->seccion_id == $seccion->seccion_id ? 'selected' : '' }}>
                            {{ $seccion->nombre }}
                        </option>
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
                        <option value="{{ $anio->ano_lectivo_id }}" {{ $curso->ano_lectivo_id == $anio->ano_lectivo_id ? 'selected' : '' }}>
                            {{ $anio->descripcion }}
                        </option>
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
                        <option value="{{ $aula->aula_id }}" {{ $curso->aula_id == $aula->aula_id ? 'selected' : '' }}>
                            {{ $aula->nombre }}
                        </option>
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
                        <option value="{{ $profesor->docente_id }}" {{ $curso->profesor_principal_id == $profesor->docente_id ? 'selected' : '' }}>
                            {{ $profesor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cupo_maximo">Cupo Máximo</label>
                <input type="number" class="form-control @error('cupo_maximo') is-invalid @enderror" id="cupo_maximo" name="cupo_maximo" value="{{ $curso->cupo_maximo }}">
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
                    <option value="" disabled>Seleccione un estado</option>
                    <option value="En Planificación" {{ $curso->estado == 'En Planificación' ? 'selected' : '' }}>En Planificación</option>
                    <option value="Disponible" {{ $curso->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Completo" {{ $curso->estado == 'Completo' ? 'selected' : '' }}>Completo</option>
                    <option value="En Curso" {{ $curso->estado == 'En Curso' ? 'selected' : '' }}>En Curso</option>
                    <option value="Finalizado" {{ $curso->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
                @error('estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>                
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        <a href="{{ route('registrarcurso.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection
