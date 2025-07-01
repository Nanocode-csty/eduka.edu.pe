@extends('cplantilla.bprincipal')
@section('titulo', 'Registrar Nueva Matrícula')
@section('contenidoplantilla')

<style>
    .form-bordered {
        margin: 0;
        border: none;
        padding-top: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #eaedf1;
    }

    .card-body.info {
        background: #f3f3f3;
        border-bottom: 1px solid rgba(0,0,0,.125);
        border-top: 1px solid rgba(0,0,0,.125);
        color: #F59D24;
    }

    .card-body.info p {
        margin-bottom: 0px;
        font-family: "Quicksand", sans-serif;
        font-weight: 600;
        color: #004a92;
    }
</style>

<div class="container-fluid" id="contenido-principal">
    <div class="row mt-4 ml-4 mr-4">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="box_block">
                <button class="btn btn-block text-left rounded-0 btn_header header_6" type="button" data-toggle="collapse" data-target="#collapseExample0" aria-expanded="true" aria-controls="collapseExample" style="background: #0A8CB3 !important; font-weight: bold; color: white;">
                    <i class="fas fa-plus-circle m-1"></i>&nbsp;Registrar Nueva Matrícula
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                
                <div class="card-body info">
                    <div class="d-flex ">
                        <div class="@flex-fill align-content-le@">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <p>
                                Complete todos los campos requeridos para registrar una nueva matrícula.
                            </p>
                            <p>
                                Estimado Usuario: Asegúrese de que el estudiante esté previamente registrado en el sistema y seleccione el curso correspondiente. Cualquier modificación posterior debe ser realizada con responsabilidad y siguiendo los protocolos establecidos por la institución.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="collapse show" id="collapseExample0">
                    <div class="card card-body rounded-0 border-0 pt-0 pb-2">
                        
                        <form method="POST" action="{{ route('matriculas.store') }}" novalidate>
                            @csrf
                            
                            <div class="row" style="padding:20px;">
                                <div class="col-12">
                                    
                                    <!-- Datos del Estudiante -->
                                    <div class="card" style="border: none">
                                        <div style="background: #E0F7FA; color: #0A8CB3; font-weight: bold; border: 2px solid #86D2E3; border-bottom: 2px solid #86D2E3; padding: 6px 20px; border-radius:4px 4px 0px 0px;">
                                            Datos del Estudiante
                                        </div>
                                        
                                        <div class="card-body" style="border: 2px solid #86D2E3; border-top: none; border-radius: 0px 0px 4px 4px !important;">
                                            <div class="row form-group">
                                                <label class="col-md-2 col-form-label">Estudiante <span style="color: #FF5A6A">(*)</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control @error('estudianteId') is-invalid @enderror" 
                                                            id="estudianteId" 
                                                            name="estudianteId" 
                                                            required>
                                                        <option value="">Seleccione un estudiante</option>
                                                        @foreach($estudiantes as $estudiante)
                                                            <option value="{{ $estudiante->estudiante_id }}" 
                                                                    {{ old('estudianteId') == $estudiante->estudiante_id ? 'selected' : '' }}>
                                                                {{ $estudiante->dni }} - {{ $estudiante->apellidos }}, {{ $estudiante->nombres }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('estudianteId')
                                                        <div class="invalid-feedback d-block text-start">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Datos de la Matrícula -->
                                    <div class="card" style="border: none">
                                        <div style="background: #E0F7FA; color: #0A8CB3; font-weight: bold; border: 2px solid #86D2E3; border-bottom: 2px solid #86D2E3; padding: 6px 20px; border-radius:4px 4px 0px 0px;">
                                            Datos de la Matrícula
                                        </div>
                                        
                                        <div class="card-body" style="border: 2px solid #86D2E3; border-top: none; border-radius: 0px 0px 4px 4px !important;">
                                            <div class="row form-group">
                                                <label class="col-md-2 col-form-label">Curso ID <span style="color: #FF5A6A">(*)</span></label>
                                                <div class="col-md-4">
                                                    <input type="number" 
                                                           class="form-control @error('cursoId') is-invalid @enderror" 
                                                           id="cursoId" 
                                                           name="cursoId" 
                                                           value="{{ old('cursoId') }}" 
                                                           placeholder="Ingrese el ID del curso"
                                                           required>
                                                    @error('cursoId')
                                                        <div class="invalid-feedback d-block text-start">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <label class="col-md-2 col-form-label">N° de Matrícula <span style="color: #FF5A6A">(*)</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" 
                                                           class="form-control @error('numeroMatricula') is-invalid @enderror" 
                                                           id="numeroMatricula" 
                                                           name="numeroMatricula" 
                                                           value="{{ old('numeroMatricula') }}" 
                                                           placeholder="Número de matrícula"
                                                           maxlength="20"
                                                           required>
                                                    @error('numeroMatricula')
                                                        <div class="invalid-feedback d-block text-start">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-text" style="color: red; font-size:small">El número de matrícula debe ser único en el sistema.</div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="col-md-2 col-form-label">Fecha de Matrícula <span style="color: #FF5A6A">(*)</span></label>
                                                <div class="col-md-10">
                                                    <input type="date" 
                                                           class="form-control @error('fechaMatricula') is-invalid @enderror" 
                                                           id="fechaMatricula" 
                                                           name="fechaMatricula" 
                                                           value="{{ old('fechaMatricula', date('Y-m-d')) }}" 
                                                           required>
                                                    @error('fechaMatricula')
                                                        <div class="invalid-feedback d-block text-start">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="col-md-2 col-form-label">Observaciones</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control @error('observaciones') is-invalid @enderror" 
                                                              id="observaciones" 
                                                              name="observaciones" 
                                                              rows="3" 
                                                              placeholder="Ingrese observaciones adicionales (opcional)"
                                                              maxlength="500">{{ old('observaciones') }}</textarea>
                                                    @error('observaciones')
                                                        <div class="invalid-feedback d-block text-start">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-text">Máximo 500 caracteres.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botones de acción -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('matriculas.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Volver al listado
                                        </a>
                                        <div>

                                            <button type="submit" class="btn btn-primary" style="background: #F59617 !important; border: none;">
                                                <i class="fas fa-save"></i> Registrar Matrícula
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<style>
    .btn-primary {
        margin-top: 1rem;
        background: #F59617 !important;
        border: none;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }
    .btn-primary:hover {
        background-color: #F59619 !important;
        transform: scale(1.01);
    }
</style>

<script>
    // Validación en tiempo real del número de matrícula
    document.getElementById('numeroMatricula').addEventListener('blur', function() {
        const numeroMatricula = this.value.trim();
        if (numeroMatricula) {
            fetch("{{ route('verificar.numero.matricula') }}?numero_matricula=${encodeURIComponent(numeroMatricula)}")
                .then(response => response.json())
                .then(data => {
                    if (data.existe) {
                        this.classList.add('is-invalid');
                        let feedback = this.parentNode.querySelector('.invalid-feedback');
                        if (!feedback) {
                            feedback = document.createElement('div');
                            feedback.className = 'invalid-feedback d-block text-start';
                            this.parentNode.appendChild(feedback);
                        }
                        feedback.textContent = 'Este número de matrícula ya está registrado.';
                    } else {
                        this.classList.remove('is-invalid');
                        const feedback = this.parentNode.querySelector('.invalid-feedback');
                        if (feedback) {
                            feedback.remove();
                        }
                    }
                })
                .catch(error => {
                    console.error('Error verificando número de matrícula:', error);
                });
        }
    });

    // Filtro de búsqueda en el select de estudiantes
    document.getElementById('estudianteId').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
            console.log('Estudiante seleccionado:', selectedOption.text);
        }
    });
</script>
@endsection