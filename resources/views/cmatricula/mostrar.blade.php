@extends('cplantilla.bprincipal')
@section('titulo', 'Detalles de Matrícula')
@section('contenidoplantilla')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-eye"></i> Detalles de la Matrícula
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Información de la Matrícula -->
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="mb-0">
                                        <i class="fas fa-clipboard-list"></i> Información de Matrícula
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td><strong><i class="fas fa-id-card"></i> N° Matrícula:</strong></td>
                                                <td>{{ $matricula->numero_matricula }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-calendar"></i> Fecha de Matrícula:</strong></td>
                                                <td>{{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-book"></i> Curso ID:</strong></td>
                                                <td>{{ $matricula->curso_id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-toggle-on"></i> Estado:</strong></td>
                                                <td>
                                                    @if($matricula->estado == 'Matriculado')
                                                        <span class="badge bg-success">{{ $matricula->estado }}</span>
                                                    @elseif($matricula->estado == 'Pre-inscrito')
                                                        <span class="badge bg-warning">{{ $matricula->estado }}</span>
                                                    @elseif($matricula->estado == 'Anulado')
                                                        <span class="badge bg-danger">{{ $matricula->estado }}</span>
                                                    @elseif($matricula->estado == 'Finalizado')
                                                        <span class="badge bg-info">{{ $matricula->estado }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $matricula->estado }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-user"></i> Usuario Registro:</strong></td>
                                                <td>{{ $matricula->usuario_registro }}</td>
                                            </tr>
                                            @if($matricula->observaciones)
                                            <tr>
                                                <td><strong><i class="fas fa-comment"></i> Observaciones:</strong></td>
                                                <td>{{ $matricula->observaciones }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Información del Estudiante -->
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">
                                        <i class="fas fa-user-graduate"></i> Información del Estudiante
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if($matricula->estudiante)
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td><strong><i class="fas fa-id-card"></i> DNI:</strong></td>
                                                <td>{{ $matricula->estudiante->dni }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-user"></i> Nombres:</strong></td>
                                                <td>{{ $matricula->estudiante->nombres }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-users"></i> Apellidos:</strong></td>
                                                <td>{{ $matricula->estudiante->apellidos }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-phone"></i> Teléfono:</strong></td>
                                                <td>{{ $matricula->estudiante->telefono ?? 'No registrado' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-envelope"></i> Email:</strong></td>
                                                <td>{{ $matricula->estudiante->email ?? 'No registrado' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-birthday-cake"></i> Fecha Nacimiento:</strong></td>
                                                <td>
                                                    @if($matricula->estudiante->fecha_nacimiento)
                                                        {{ \Carbon\Carbon::parse($matricula->estudiante->fecha_nacimiento)->format('d/m/Y') }}
                                                    @else
                                                        No registrado
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong><i class="fas fa-venus-mars"></i> Género:</strong></td>
                                                <td>
                                                    @if($matricula->estudiante->genero == 'M')
                                                        Masculino
                                                    @elseif($matricula->estudiante->genero == 'F')
                                                        Femenino
                                                    @else
                                                        No especificado
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($matricula->estudiante->direccion)
                                            <tr>
                                                <td><strong><i class="fas fa-map-marker-alt"></i> Dirección:</strong></td>
                                                <td>{{ $matricula->estudiante->direccion }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @else
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        No se encontró información del estudiante asociado.
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('matriculas.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Volver al listado
                                </a>
                                <div>
                                    <a href="{{ route('matriculas.edit', $matricula->matricula_id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar Matrícula
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection