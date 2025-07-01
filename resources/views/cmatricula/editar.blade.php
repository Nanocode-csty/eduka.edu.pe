@extends('cplantilla.bprincipal')
@section('titulo', 'Editar Matrícula')
@section('contenidoplantilla')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">
                        <i class="fas fa-edit"></i> Editar Matrícula
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Modifique los campos necesarios para actualizar la información de la matrícula.</strong>
                        <br>
                        Revise cuidadosamente los cambios antes de guardar.
                    </div>

                    <form method="POST" action="{{ route('matriculas.update', $matricula->matricula_id) }}" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Selección de Estudiante -->
                            <div class="col-md-6 mb-3">
                                <label for="estudianteId" class="form-label">
                                    <i class="fas fa-user-graduate"></i> Estudiante <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('estudianteId') is-invalid @enderror" 
                                        id="estudianteId" 
                                        name="estudianteId" 
                                        required>
                                    <option value="">Seleccione un estudiante</option>
                                    @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->estudiante_id }}" 
                                                {{ (old('estudianteId', $matricula->estudiante_id) == $estudiante->estudiante_id) ? 'selected' : '' }}>
                                            {{ $estudiante->dni }} - {{ $estudiante->apellidos }}, {{ $estudiante->nombres }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('estudianteId')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Curso ID -->
                            <div class="col-md-6 mb-3">
                                <label for="cursoId" class="form-label">
                                    <i class="fas fa-book"></i> Curso ID <span class="text-danger">*</span>
                                </label>
                                <input type="number" 
                                       class="form-control @error('cursoId') is-invalid @enderror" 
                                       id="cursoId" 
                                       name="cursoId" 
                                       value="{{ old('cursoId', $matricula->curso_id) }}" 
                                       placeholder="Ingrese el ID del curso"
                                       required>
                                @error('cursoId')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Número de Matrícula -->
                            <div class="col-md-6 mb-3">
                                <label for="numeroMatricula" class="form-label">
                                    <i class="fas fa-id-card"></i> Número de Matrícula <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('numeroMatricula') is-invalid @enderror" 
                                       id="numeroMatricula" 
                                       name="numeroMatricula" 
                                       value="{{ old('numeroMatricula', $matricula->numero_matricula) }}" 
                                       placeholder="Ingrese el número de matrícula"
                                       maxlength="20"
                                       required>
                                @error('numeroMatricula')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">El número de matrícula debe ser único en el sistema.</div>
                            </div>

                            <!-- Fecha de Matrícula -->
                            <div class="col-md-6 mb-3">
                                <label for="fechaMatricula" class="form-label">
                                    <i class="fas fa-calendar"></i> Fecha de Matrícula <span class="text-danger">*</span>
                                </label>
                                <input type="date" 
                                       class="form-control @error('fechaMatricula') is-invalid @enderror" 
                                       id="fechaMatricula" 
                                       name="fechaMatricula" 
                                       value="{{ old('fechaMatricula', $matricula->fecha_matricula ? \Carbon\Carbon::parse($matricula->fecha_matricula)->format('Y-m-d') : '') }}" 
                                       required>
                                @error('fechaMatricula')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Estado -->
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    <i class="fas fa-toggle-on"></i> Estado <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('estado') is-invalid @enderror" 
                                        id="estado" 
                                        name="estado" 
                                        required>
                                    <option value="">Seleccione el estado</option>
                                    <option value="Pre-inscrito" {{ old('estado', $matricula->estado) == 'Pre-inscrito' ? 'selected' : '' }}>
                                        Pre-inscrito
                                    </option>
                                    <option value="Matriculado" {{ old('estado', $matricula->estado) == 'Matriculado' ? 'selected' : '' }}>
                                        Matriculado
                                    </option>
                                    <option value="Anulado" {{ old('estado', $matricula->estado) == 'Anulado' ? 'selected' : '' }}>
                                        Anulado
                                    </option>
                                    <option value="Finalizado" {{ old('estado', $matricula->estado) == 'Finalizado' ? 'selected' : '' }}>
                                        Finalizado
                                    </option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Observaciones -->
                            <div class="col-md-6 mb-3">
                                <label for="observaciones" class="form-label">
                                    <i class="fas fa-comment"></i> Observaciones
                                </label>
                                <textarea class="form-control @error('observaciones') is-invalid @enderror" 
                                          id="observaciones" 
                                          name="observaciones" 
                                          rows="3" 
                                          placeholder="Ingrese observaciones adicionales (opcional)"
                                          maxlength="500">{{ old('observaciones', $matricula->observaciones) }}</textarea>
                                @error('observaciones')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Máximo 500 caracteres.</div>
                            </div>
                        </div>

                        <!-- Información actual -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="alert alert-light">
                                    <h6><i class="fas fa-info-circle"></i> Información actual:</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small>
                                                <strong>Matrícula actual:</strong> {{ $matricula->numero_matricula }}<br>
                                                <strong>Estudiante actual:</strong> {{ $matricula->estudiante->apellidos ?? 'N/A' }}, {{ $matricula->estudiante->nombres ?? 'N/A' }}<br>
                                                <strong>DNI:</strong> {{ $matricula->estudiante->dni ?? 'N/A' }}
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <small>
                                                <strong>Fecha actual:</strong> {{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}<br>
                                                <strong>Estado actual:</strong> {{ $matricula->estado }}<br>
                                                <strong>Curso actual:</strong> {{ $matricula->curso_id }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('matriculas.index') }}" class="btn btn-secondary me-2">
                                            <i class="fas fa-arrow-left"></i> Volver al listado
                                        </a>
                                        <a href="{{ route('matriculas.show', $matricula->matricula_id) }}" class="btn btn-info">
                                            <i class="fas fa-eye"></i> Ver detalles
                                        </a>
                                    </div>
                                    <div>
                                        <button type="reset" class="btn btn-outline-warning me-2">
                                            <i class="fas fa-undo"></i> Restaurar cambios
                                        </button>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fas fa-save"></i> Actualizar Matrícula
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Validación en tiempo real del número de matrícula
    document.getElementById('numeroMatricula').addEventListener('blur', function() {
        const numeroMatricula = this.value.trim();
        const matriculaActual = '{{ $matricula->numero_matricula }}';
        
        if (numeroMatricula && numeroMatricula !== matriculaActual) {
            fetch("{{ route ('verificar.numero.matricula') }}?numero_matricula=${encodeURIComponent(numeroMatricula)}")
                .then(response => response.json())
                .then(data => {
                    if (data.existe) {
                        this.classList.add('is-invalid');
                        let feedback = this.parentNode.querySelector('.invalid-feedback');
                        if (!feedback) {
                            feedback = document.createElement('div');
                            feedback.className = 'invalid-feedback';
                            this.parentNode.appendChild(feedback);
                        }
                        feedback.textContent = 'Este número de matrícula ya está registrado.';
                    } else {
                        this.classList.remove('is-invalid');
                        const feedback = this.parentNode.querySelector('.invalid-feedback');
                        if (feedback && feedback.textContent.includes('ya está registrado')) {
                            feedback.remove();
                        }
                    }
                })
                .catch(error => {
                    console.error('Error verificando número de matrícula:', error);
                });
            }
        });

    // Resetear formulario
    document.querySelector('button[type="reset"]').addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('¿Está seguro de que desea restaurar todos los campos a sus valores originales?')) {
            location.reload();
        }
    });
</script>
@endsection