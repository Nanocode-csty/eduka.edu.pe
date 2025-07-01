@extends('cplantilla.bprincipal')
@section('titulo','Confirmar Eliminación')
@section('contenidoplantilla')
<div class="container">
    <h1>¿Desea eliminar este curso?</h1>
    <p>Código: {{ $curso->curso_id }}</p>
    <p>Grado: {{ $curso->grado->nombre ?? 'No asignado' }}</p>
    <p>Sección: {{ $curso->seccion->nombre ?? 'No asignado' }}</p>
    <p>Año Lectivo: {{ $curso->anoLectivo->descripcion ?? 'No asignado' }}</p>
    
    <form method="POST" action="{{ route('registrarcurso.destroy', $curso->curso_id)}}">
        @method('DELETE')
        @csrf 
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ, Eliminar</button>
        <a href="{{ route('registrarcurso.index')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO, Cancelar</a>
    </form>
</div>
@endsection
