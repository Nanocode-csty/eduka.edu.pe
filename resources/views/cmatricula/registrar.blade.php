@extends('cplantilla.bprincipal')
@section('titulo', 'Registro y listado de matrículas')
@section('contenidoplantilla')

<div class="container-fluid">
    <div class="row mt-4 ml-4 mr-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #0A8CB3 !important; color: white">
                    <h4 class="mb-0">
                        <i class="fas fa-clipboard-list mx-1"></i> Registro y listado de matrículas
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info color">
                        <i class="fas fa-info-circle"></i>
                        <strong>En esta sección, podrás matricular nuevos estudiantes y consultar la información de las matrículas que ya están registradas.</strong>
                        <br>
                        Estimado Usuario: Asegúrate de revisar cuidadosamente los datos antes de guardarlos, ya que esta información será utilizada para la gestión académica y administrativa del estudiante. Cualquier modificación posterior debe ser realizada con responsabilidad y siguiendo los protocolos establecidos por la institución.
                    </div>

                    <!-- Sección de búsqueda y botón de registro -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <a href="{{ route('matriculas.create') }}" class="btn btn-warning fw-bold" style="background-color: #F59617 !important;">
                                <i class="fas fa-plus mx-2"></i> Generar Matrícula
                            </a>
                        </div>
                        <div class="col-md-8">
                            <form method="GET" action="{{ route('matriculas.index') }}">
                                <div class="input-group">
                                    <input type="text" 
                                           class="form-control" 
                                           name="buscarpor"
                                           autocomplete="off" 
                                           placeholder="Buscar por número de matrícula" 
                                           value="{{ $buscarpor }}"
                                           aria-label="Buscar por número de matrícula">
                                    <button class="btn btn-warning" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabla de matrículas -->
                    @if($matricula->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%">
                                        <i class="fas fa-chevron-down"></i>
                                    </th>
                                    <th>N° Matrícula</th>
                                    <th>DNI Estudiante</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Fecha Matrícula</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matricula as $mat)
                                <tr>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#detalle{{ $mat->matricula_id }}" aria-expanded="false">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </td>
                                    <td>{{ $mat->numero_matricula }}</td>
                                    <td>{{ $mat->estudiante->dni ?? 'N/A' }}</td>
                                    <td>{{ $mat->estudiante->apellidos ?? 'N/A' }}</td>
                                    <td>{{ $mat->estudiante->nombres ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mat->fecha_matricula)->format('d/m/Y') }}</td>
                                    <td>
                                        @if($mat->estado == 'Matriculado')
                                            <span class="badge bg-success">{{ $mat->estado }}</span>
                                        @elseif($mat->estado == 'Pre-inscrito')
                                            <span class="badge bg-warning">{{ $mat->estado }}</span>
                                        @elseif($mat->estado == 'Anulado')
                                            <span class="badge bg-danger">{{ $mat->estado }}</span>
                                        @elseif($mat->estado == 'Finalizado')
                                            <span class="badge bg-info">{{ $mat->estado }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $mat->estado }}</span>
                                        @endif
                                    </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('matriculas.show', $mat->matricula_id) }}" 
                                                class="btn btn-info btn-sm" 
                                                title="Ver detalles">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('matriculas.edit', $mat->matricula_id) }}" 
                                                class="btn btn-warning btn-sm" 
                                                title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" 
                                                    action="{{ route('matriculas.destroy', $mat->matricula_id) }}" 
                                                    style="display: inline-block;"
                                                    onsubmit="return confirmarEliminacion('{{ $mat->numero_matricula }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm" 
                                                            title="Eliminar"
                                                            @if($mat->estado == 'Matriculado') disabled @endif>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                <!-- Fila desplegable con detalles -->
                                <tr class="collapse" id="detalle{{ $mat->matricula_id }}">
                                    <td colspan="8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <strong>Información del Estudiante:</strong>
                                                        <ul class="list-unstyled mt-2">
                                                            <li><strong>DNI:</strong> {{ $mat->estudiante->dni ?? 'N/A' }}</li>
                                                            <li><strong>Teléfono:</strong> {{ $mat->estudiante->telefono ?? 'N/A' }}</li>
                                                            <li><strong>Email:</strong> {{ $mat->estudiante->email ?? 'N/A' }}</li>
                                                            <li><strong>Dirección:</strong> {{ $mat->estudiante->direccion ?? 'N/A' }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Información de la Matrícula:</strong>
                                                        <ul class="list-unstyled mt-2">
                                                            <li><strong>Curso ID:</strong> {{ $mat->curso_id }}</li>
                                                            <li><strong>Fecha de Matrícula:</strong> {{ \Carbon\Carbon::parse($mat->fecha_matricula)->format('d/m/Y') }}</li>
                                                            <li><strong>Estado:</strong> {{ $mat->estado }}</li>
                                                            @if($mat->observaciones)
                                                                <li><strong>Observaciones:</strong> {{ $mat->observaciones }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $matricula->appends(request()->query())->links() }}
                    </div>
                    @else
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>No se encontraron matrículas registradas.</strong>
                        @if($buscarpor)
                            <br>No hay resultados para la búsqueda "{{ $buscarpor }}".
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 1050;" role="alert">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@endsection

@section('scripts')
<script>
    // Auto-hide success and error messages
    setTimeout(function() {
        $('.alert-success, .alert-danger').fadeOut();
    }, 5000);

    // Función para confirmar eliminación
    function confirmarEliminacion(numeroMatricula) {
        return confirm('¿Estás seguro de que deseas eliminar la matrícula N° ' + numeroMatricula + '?\n\nEsta acción no se puede deshacer.');
    }
</script>

@endsection