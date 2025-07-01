@extends('cplantilla.bprincipal')
@section('titulo','Listado de Cursos')

@section('contenidoplantilla') 
<div class="container-fluid">
    <div class="row mt-4 mr-4 ml-4">

    <h3>Listado de Cursos </h3>
    <div></div>
    <a href="{{ route('registrarcurso.create') }}" class="mt-5 btn btn-primary mb-3"><i class="fas fa-plus"></i> Nuevo Curso</a>
    
    <nav class="navbar navbar-light bg-light mb-3">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar curso" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
    @if (session('datos'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Grado</th>
                <th scope="col">Sección</th>
                <th scope="col">Año Lectivo</th>
                <th scope="col">Aula</th>
                <th scope="col">Profesor Principal</th>
                <th scope="col">Cupo Máximo</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->curso_id }}</td>
                    <td>{{ $curso->grado->nombre ?? 'No asignado' }}</td>
                    <td>{{ $curso->seccion->nombre ?? 'No asignado' }}</td>
                    <td>{{ $curso->anoLectivo->nombre ?? 'No asignado' }}</td>
                    <td>{{ $curso->aula->nombre ?? 'No asignado' }}</td>
                    <td>{{ $curso->profesor->nombre ?? 'No asignado' }}</td>
                    <td>{{ $curso->cupo_maximo }}</td>
                    <td>{{ $curso->estado }}</td>
                    <td>
                        <a href="{{ route('registrarcurso.edit', $curso->curso_id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('registrarcurso.confirmar', $curso->curso_id) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cursos->links() }}
    </div>
</div>
@endsection
