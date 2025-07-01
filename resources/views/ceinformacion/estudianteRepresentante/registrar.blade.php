@extends('cplantilla.bprincipal') 
@section('titulo','Registrar Representantes de Estudiantes')
@section('contenidoplantilla')

<style> 
    .estilo-info{
        margin-bottom: 0px;
        font-family: "Quicksand", sans-serif;
        font-weight: 700;
        font-size: clamp(0.9rem, 2.0vw, 0.9rem) !important;
       
    }
    
</style>

<div class="container-fluid estilo-info" id="contenido-principal">
    <div class="row mt-4 mr-4 ml-4">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="box_block">
                
                <button class="btn btn-block text-left rounded-0 btn_header header_6" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample" style="background: #0A8CB3 !important; font-weight: bold; color: white;">
                    <i class="fas fa-file-signature m-1"></i>&nbsp;Estudiante a asignar Representante Legal <!--TITULO PRINCIPAL DEL CARD-->
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                
                <div class="card-body info">
                    <div class="d-flex ">
                        <div class="@*flex-fill align-content-le*@">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <!--TEXTOS DEL CARD, SIEMPRE SE MUESTRA-->
                            <p>
                                Este es el estudiante al que se le asignará su Representante Legal.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="collapse show" id="collapseExample1">
                    <div class="card card-body rounded-0 border-0 pt-0 pb-2">
                        <div class="row align-items-center">
                            <!-- Botón a la izquierda -->
                            


                    <script>
                    document.addEventListener('DOMContentLoaded', function () {

                        const inputDNI = document.getElementById('dniEstudianteAsignar');
                        inputDNI.value = dniBuscar.getAttribute();

                    });
                    </script>


                        </div>

                        <!-- Loader oculto -->
                        <div id="loaderAnimado" style="display: none;">
                        <div class="overlay-local">
                        <div class="spinner-container">
                            <span class="circle c1"></span>
                            <span class="circle c2"></span>
                            <span class="circle c3"></span>
                            <span class="circle c4"></span>
                        </div>
                        </div>
                        </div>

<!-- Script para validar búsqueda -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const formBuscar = document.getElementById('formBuscar');
    const inputBuscar = document.getElementById('inputBuscar');

    formBuscar.addEventListener('submit', function (e) {
    if (inputBuscar.value.trim() === '') {
        e.preventDefault();
        alert('Por favor, ingresa texto para buscar.');
    }
    });
});
</script>


<div class="container">
    <div class="row">
        <div class="col-12 ">
            
            <div class="row mt-4">
            <div class="col-12 ">
            
            <div class="card" style="border: none">
                    <div style="background: #E0F7FA; color: #0A8CB3; font-weight: bold; border: 2px solid #86D2E3; border-bottom: 2px solid #86D2E3; padding: 6px 20px; border-radius:4px 4px 0px 0px;">
                        Datos del estudiante
                    </div>

                    <div class="card-body" style="border: 2px solid #86D2E3; border-top: none; border-radius: 0px 0px 4px 4px !important;">
                        <form method="POST" action="{{ route('estudiante.store') }}" autocomplete="off">
                        @csrf
                            <div class="row form-group">
                                <label class="col-md-2 col-form-label">N° DNI <span style="color: #FF5A6A">(*)</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="dniEstudianteAsignar" name="dniEstudianteAsignar" maxlength="8" placeholder="N° DNI" value="{{ session('dniBuscar') }}">
                                    <div id="dni-error" class="text-danger d-none">Este DNI ya está registrado.</div>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('#dniEstudianteAsignar').on('input', function() {
                                    const dni = $(this).val();

                                    if (dni.length === 8) {
                                        $.ajax({
                                            url: '{{ route("verificar.dni") }}',
                                            method: 'GET',
                                            data: { dni },
                                            success: function(response) {
                                                if (response.existe) {
                                                    $('#dni-error').removeClass('d-none');
                                                    $('#dniEstudianteAsignar').addClass('is-invalid');
                                                    $('#btnAsignar').prop('disabled', true);
                                                } else {
                                                    $('#dni-error').addClass('d-none');
                                                    $('#dniEstudianteAsignar').removeClass('is-invalid');
                                                    $('#btnAsignar').prop('disabled', false);
                                                }
                                            }
                                        });
                                    } else {
                                        $('#dni-error').addClass('d-none');
                                        $('#dniEstudianteAsignar').removeClass('is-invalid');
                                        $('#btnAsignar').prop('disabled', true);
                                    }
                                });
                            </script>

                        </div>
                    </div>

            </form> 
    </div>
    
</div>
                </div>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>

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

<style type="text/css" data-glamor=""></style><meta name="react-film" content="version=1.2.1-master.db29968"><meta name="botframework-webchat:bundle:variant" content="full"><meta name="botframework-webchat:bundle:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:core:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:ui:version" content="4.3.1-master.98c662f"><style type="text/css">.fancybox-margin{margin-right:10px;}</style>

<div class="mt-2 container-fluid estilo-info" id="contenido-principal">
    <div class="row mr-4 ml-4">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="box_block">
                
                <button class="btn btn-block text-left rounded-0 btn_header header_6" type="button" data-toggle="collapse" data-target="#collapseExample0" aria-expanded="true" aria-controls="collapseExample" style="background: #0A8CB3 !important; font-weight: bold; color:white">
                    <i class="fas fa-file-signature m-1"></i>&nbsp;Asignación de representante(s) de estudiante <!--TITULO PRINCIPAL DEL CARD-->
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                
                <div class="card-body info">
                    <div class="d-flex ">
                        <div class="@*flex-fill align-content-le*@">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <!--TEXTOS DEL CARD, SIEMPRE SE MUESTRA-->
                            <p>
                                En esta sección, podrás asignar Representantes Legales a los estudiantes, así como consultar información de los registrados.
                            </p>
                            <p>
                                Estimado Usuario: Asegúrate de revisar cuidadosamente los datos antes de guardarlos, ya que esta información será utilizada para la gestión académica y administrativa del estudiante. Cualquier modificación posterior debe ser realizada con responsabilidad y siguiendo los protocolos establecidos por la institución.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="collapse show" id="collapseExample0">
                    <div class="card card-body rounded-0 border-0 pt-0 pb-2">
                        <div class="row align-items-center">
                            <!-- Botón a la izquierda -->
                            <div class="col-md-6 mb-md-0 d-flex justify-content-start">
                                <a class="btn btn-primary" id="nuevoRegistroBtn" style="color: #f1f1f1">
                                    <i class="fa fa-plus mx-2"></i> Registrar Representante
                                </a>
                            </div>

                            <!-- Formulario de búsqueda a la derecha -->
                            <div class="col-md-6 d-flex justify-content-md-end justify-content-start">
                                <form id="formBuscar" class="mx-3 w-100" style="max-width: 100%;" autocomplete="off">
                                    <div class="input-group">
                                        <input maxlength="8" id="inputBuscar" name="buscarpor" class="form-control mt-3" type="search"
                                            placeholder="Buscar representante por DNI" aria-label="Search" style="border-color: #F59617;">
                                        <button id="btnBuscar" class="btn btn-primary nuevo-boton" type="submit"
                                                style="border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnRegistrar = document.getElementById('nuevoRegistroBtn');
    const inputBuscar = document.getElementById('inputBuscar');
    const btnBuscar = document.getElementById('btnBuscar');

    // 1. Si se escribe en el buscador, desactiva el botón "Registrar"
    inputBuscar.addEventListener('input', function () {
        if (inputBuscar.value.trim().length > 0) {
            btnRegistrar.classList.add('disabled');
            btnRegistrar.style.pointerEvents = 'none';
        } else {
            btnRegistrar.classList.remove('disabled');
            btnRegistrar.style.pointerEvents = 'auto';
        }
    });

    // 2. Si se hace clic en "Registrar Representante", se bloquea el buscador
    btnRegistrar.addEventListener('click', function (e) {
        // Simula acción, puedes quitar esto si lleva a otra página
        e.preventDefault();

        inputBuscar.disabled = true;
        btnBuscar.disabled = true;
    });
});
</script>

<script>
document.getElementById('formBuscar').addEventListener('submit', function(e) {
    e.preventDefault();

    const dni = document.getElementById('inputBuscar').value.trim();

    if (dni.length === 8 && /^\d+$/.test(dni)) {
    fetch("{{ route('buscar.representante') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ dni: dni })
    })
    .then(response => response.json())
    .then(data => {
        const inputBuscar = document.getElementById('inputBuscar');
        const btnBuscar = document.getElementById('btnBuscar');
        const btnAsignar = document.getElementById('btnAsignar');
        const select = document.getElementById('parentescoRepresentante');

        if (data.success) {
            document.getElementById('resultadoRepresentante').innerHTML = `
                <div class="alert alert-success mt-3 ml-3 w-100 text-center px-4" id="alertaTemporal">
                    <strong>✅ Representante registrado:</strong> El Representante se encuentra registrado correctamente.
                </div>
            `;

            setTimeout(() => {
                const alerta = document.getElementById('alertaTemporal');
                if (alerta) alerta.remove();
            }, 2000);

            // Habilitar/deshabilitar botones y campos
            inputBuscar.disabled = true;
            btnBuscar.disabled = true;
            btnAsignar.disabled = false;
            select.disabled = false;

            // Seleccionar el parentesco solo si existe la opción
            const parentesco = data.representante.parentesco;
            for (let option of select.options) {
                if (option.value === parentesco) {
                    select.value = parentesco;
                    break;
                }
            }

            // Asignar valores a inputs
            document.getElementById('idRepresentante').value = data.representante.representante_id || "";
            document.getElementById('apellidoPaternoEstudiante').value = data.representante.apellidoPaterno || "";
            document.getElementById('apellidoMaternoEstudiante').value = data.representante.apellidoMaterno || "";
            document.getElementById('nombreEstudiante').value = data.representante.nombres || "";
            document.getElementById('dniEstudiante').value = data.representante.dni || "";
            document.getElementById('ocupacionRepresentante').value = data.representante.ocupacion || "";
            document.getElementById('numeroCelularEstudiante').value = data.representante.telefono || "";
            document.getElementById('numeroCelularEstudiante1').value = data.representante.telefono_alternativo || "";
            document.getElementById('correoEstudiante').value = data.representante.email || "";
            document.getElementById('calleEstudiante').value = data.representante.direccion || "";
            select.disabled = true;

        } else {
            document.getElementById('resultadoRepresentante').innerHTML = `
                <div class="alert alert-warning mt-3 ml-3 w-100" style="max-width: 100%;" id="alertaTemporal">
                    <strong>⚠️ Atención:</strong> ${data.message}
                </div>
            `;

            setTimeout(() => {
                const alerta = document.getElementById('alertaTemporal');
                if (alerta) alerta.remove();
            }, 2000);

            // Limpiar inputs
            document.getElementById('apellidoPaternoEstudiante').value = "";
            document.getElementById('apellidoMaternoEstudiante').value = "";
            document.getElementById('nombreEstudiante').value = "";
            document.getElementById('dniEstudiante').value = "";
            select.selectedIndex = 0; // Seleccionar opción por defecto
            document.getElementById('ocupacionRepresentante').value = "";
            document.getElementById('numeroCelularEstudiante').value = "";
            document.getElementById('numeroCelularEstudiante1').value = "";
            document.getElementById('correoEstudiante').value = "";
            document.getElementById('calleEstudiante').value = "";

            const btnRegistrar = document.getElementById('nuevoRegistroBtn');
            btnRegistrar.classList.remove('disabled');
            btnRegistrar.style.pointerEvents = 'auto';

            inputBuscar.value = "";
            inputBuscar.disabled = false;
            btnBuscar.disabled = false;
            btnAsignar.disabled = true;
            select.disabled = true;
        }
    })
    .catch(error => {
        console.error(error);
        alert('Ocurrió un error al buscar el representante.');
    });
} else {
    alert('Por favor, ingrese un DNI válido de 8 dígitos.');
}

});
</script>

<div id="resultadoRepresentante" class="mt-3"></div>
                        </div>

                        <!-- Loader oculto -->
                        <div id="loaderAnimado" style="display: none;">
                        <div class="overlay-local">
                        <div class="spinner-container">
                            <span class="circle c1"></span>
                            <span class="circle c2"></span>
                            <span class="circle c3"></span>
                            <span class="circle c4"></span>
                        </div>
                        </div>
                        </div>

                        <!-- Script para validar búsqueda -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const formBuscar = document.getElementById('formBuscar');
                            const inputBuscar = document.getElementById('inputBuscar');

                            formBuscar.addEventListener('submit', function (e) {
                            if (inputBuscar.value.trim() === '') {
                                e.preventDefault();
                                alert('Por favor, ingresa texto para buscar.');
                            }
                            });
                        });
                        </script>
                        <div class="row form-bordered align-items-center"></div>
                        <div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            
            <!--PADDIG PARA DARLE ESPACIO ENTRE EL CONTENEDOR Y EL CONTENIDO-->           
            <div class="row" style="padding:20px;">
                
            <div class="col-12">
            
            <div class="card" style="border: none">
                    <div style="background: #E0F7FA; color: #0A8CB3; font-weight: bold; border: 2px solid #86D2E3; border-bottom: 2px solid #86D2E3; padding: 6px 20px; border-radius:4px 4px 0px 0px;">
                        Datos del representante
                    </div>
                    
                    <div class="card-body" style="border: 2px solid #86D2E3; border-top: none; border-radius: 0px 0px 4px 4px !important;">
                        <form action="{{ route('asignar.representante') }}" method="POST">
                        @csrf
                            <div class="row form-group">
                                <label class="col-md-2 col-form-label">Apellido Paterno <span style="color: #FF5A6A">(*)</span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control @error('apellidoPaternoEstudiante') is-invalid @enderror" id="apellidoPaternoEstudiante" name="apellidoPaternoEstudiante" placeholder="Apellido paterno" maxlength="100" value="{{ old('apellidoPaternoEstudiante') }}" disabled>
                                    @if ($errors->has('apellidoPaternoEstudiante'))
                                    <span class="invalid-feedback d-block text-start">{{ $errors->first('apellidoPaternoEstudiante') }}</span>
                                    @endif 
                                </div>
                                <label class="col-md-2 col-form-label">Apellido Materno <span style="color: #FF5A6A">(*)</span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control @error('apellidoMaternoEstudiante') is-invalid @enderror" id="apellidoMaternoEstudiante" name="apellidoMaternoEstudiante" placeholder="Apellido materno" maxlength="100" value="{{ old('apellidoMaternoEstudiante') }}" disabled>
                                    @if ($errors->has('apellidoMaternoEstudiante'))
                                    <span class="invalid-feedback d-block text-start">{{ $errors->first('apellidoMaternoEstudiante') }}</span>
                                    @endif 
                                </div>
                                    
                                    <input type="hidden" class="form-control @error('idRepresentante') is-invalid @enderror"
                                            id="idRepresentante" name="idRepresentante" value="{{ old('idRepresentante') }}">
                                    
                                    <input type="hidden" class="form-control" id="idEstudiante" name="idEstudiante" value="{{ session('idEstudiante') }}">


       
                            </div>
                            
                            <div class="row form-group">
                                <label class="col-md-2 col-form-label">
                                    Nombres <span style="color: #FF5A6A">(*)</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('nombreEstudiante') is-invalid @enderror" id="nombreEstudiante" name="nombreEstudiante" placeholder="Nombres" maxlength="100" value="{{ old('nombreEstudiante') }}" disabled>
                                    @if ($errors->has('nombreEstudiante'))
                                    <span class="invalid-feedback d-block text-start">{{ $errors->first('nombreEstudiante') }}</span>
                                    @endif            
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-2 col-form-label">Parentesco <span style="color: #FF5A6A">(*)</span></label>
                                <div class="col-md-4">
                                    <select class="form-control @error('parentescoRepresentante') is-invalid @enderror" id="parentescoRepresentante" name="parentescoRepresentante" disabled>
                                        <option value="" disabled {{ old('parentescoRepresentante') == '' ? 'selected' : '' }}>Seleccionar parentesco</option>
                                        <option value="Padre" {{ old('parentescoRepresentante') == 'Padre' ? 'selected' : '' }}>Padre</option>
                                        <option value="Madre" {{ old('parentescoRepresentante') == 'Madre' ? 'selected' : '' }}>Madre</option>
                                        <option value="Tutor Legal" {{ old('parentescoRepresentante') == 'TutorLegal' ? 'selected' : '' }}>Tutor Legal</option>
                                    </select>
                                    @error('parentescoRepresentante')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 col-form-label">N° DNI <span style="color: #FF5A6A">(*)</span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="dniEstudiante" name="dniEstudiante" maxlength="8" placeholder="N° DNI" value="{{ old('dniEstudiante') }}" disabled>
                                    <div id="dni-error" class="text-danger d-none">Este DNI ya está registrado.</div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('#dniEstudiante').on('input', function() {
                                    const dni = $(this).val();

                                    if (dni.length === 8) {
                                        $.ajax({
                                            url: '{{ route("verificar.dni") }}',
                                            method: 'GET',
                                            data: { dni },
                                            success: function(response) {
                                                if (response.existe) {
                                                    $('#dni-error').removeClass('d-none');
                                                    $('#dniEstudiante').addClass('is-invalid');
                                                    $('#btnAsignar').prop('disabled', true);
                                                } else {
                                                    $('#dni-error').addClass('d-none');
                                                    $('#dniEstudiante').removeClass('is-invalid');
                                                    $('#btnAsignar').prop('disabled', false);
                                                }
                                            }
                                        });
                                    } else {
                                        $('#dni-error').addClass('d-none');
                                        $('#dniEstudiante').removeClass('is-invalid');
                                        $('#btnAsignar').prop('disabled', true);
                                    }
                                });
                            </script>


                            <!-- Flatpickr CSS -->
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

                            <div class="row form-group">
                                <label class="col-md-2 col-form-label">
                                    Ocupación
                                </label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="ocupacionRepresentante" name="ocupacionRepresentante" placeholder="Observaciones sobre el estudiante" value="" maxlength="100" disabled>
                                </div>
                            </div>
    <style>
        /* Borde dorado personalizado */
        .form-control.custom-gold {
            border: 2px solid #DAA520 !important;
            background-color: white !important;
            color: black;
        }
    </style>
    
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        const inputs = {
            apellidoPaterno: document.getElementById('apellidoPaternoEstudiante'),
            apellidoMaterno: document.getElementById('apellidoMaternoEstudiante'),
            nombres: document.getElementById('nombreEstudiante'),
            genero: document.getElementById('generoEstudiante'),
            dni: document.getElementById('dniEstudiante'),
            fechaNacimiento: document.getElementById('fechaNacimientoEstudiante'),
        };

        function setInvalid(input, message) {
            input.classList.add('is-invalid');
            let feedback = input.parentElement.querySelector('.invalid-feedback');
            if (!feedback) {
                feedback = document.createElement('div');
                feedback.className = 'invalid-feedback d-block text-start';
                input.parentElement.appendChild(feedback);
            }
            feedback.textContent = message;
        }

        function clearInvalid(input) {
            input.classList.remove('is-invalid');
            const feedback = input.parentElement.querySelector('.invalid-feedback');
            if (feedback) feedback.remove();
        }

        inputs.apellidoPaterno.addEventListener('input', function () {
            if (this.value.length < 2 || this.value.length > 100) {
                setInvalid(this, 'Debe tener entre 2 y 100 caracteres.');
            } else {
                clearInvalid(this);
            }
        });

        inputs.apellidoMaterno.addEventListener('input', function () {
            if (this.value.length < 2 || this.value.length > 100) {
                setInvalid(this, 'Debe tener entre 2 y 100 caracteres.');
            } else {
                clearInvalid(this);
            }
        });

        inputs.nombres.addEventListener('input', function () {
            if (this.value.length < 2 || this.value.length > 100) {
                setInvalid(this, 'Debe tener entre 2 y 100 caracteres.');
            } else {
                clearInvalid(this);
            }
        });

        inputs.dni.addEventListener('input', function () {
            const regex = /^\d{8}$/;
            if (!regex.test(this.value)) {
                setInvalid(this, 'El DNI debe contener exactamente 8 números.');
            } else {
                clearInvalid(this);
            }
        });

        inputs.genero.addEventListener('change', function () {
            if (!this.value) {
                setInvalid(this, 'Seleccione una opción.');
            } else {
                clearInvalid(this);
            }
        });
    });
</script>


    <!-- Flatpickr JS y Español -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
    flatpickr("#fechaNacimientoEstudiante", {
        dateFormat: "Y-m-d",
        maxDate: "today",
        locale: "es",
        onChange: function(selectedDates, dateStr, instance) {
            const input = document.getElementById('fechaNacimientoEstudiante');
            const feedback = input.parentElement.querySelector('.feedback-message');

            if (dateStr) {
                input.classList.remove('is-invalid');
                if (feedback) feedback.remove(); // Borra el mensaje si ya había uno
            }
        }
    });
</script>


                        </div>
                    </div>
 
                <div class="card" style="border: none">
                    <div style="background: #E0F7FA; color: #0A8CB3; font-weight: bold; border: 2px solid #86D2E3; border-bottom: 2px solid #86D2E3; padding: 6px 20px; border-radius:4px 4px 0px 0px;">
                        Datos de contacto y residencia
                    </div>
                    
                    <div class="card-body" style="border: 2px solid #86D2E3; border-top: none; border-radius: 0px 0px 4px 4px !important;">

                    <div class="row form-group">
                        <label class="col-md-2 col-form-label">
                            Celular actual <span style="color: #FF5A6A">(*)</span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                
                            <input type="text" class="form-control @error('numeroCelularEstudiante') is-invalid @enderror" id="numeroCelularEstudiante" name="numeroCelularEstudiante" placeholder="N° celular" maxlength="9" value="{{ old('numeroCelularEstudiante') }}" inputmode="numeric" disabled>
                                                        
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                @error('numeroCelularEstudiante')
                                                        <div class="invalid-feedback d-block text-start">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                            </div>
                        </div>

                        <label class="col-md-2 col-form-label">Celular alternativo</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                
                            <input type="text" class="form-control @error('numeroCelularEstudiante') is-invalid @enderror" id="numeroCelularEstudiante1" name="numeroCelularEstudiante1" placeholder="N° celular" maxlength="9" value="{{ old('numeroCelularEstudiante') }}" inputmode="numeric" disabled>
                                                        
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                @error('numeroCelularEstudiante')
                                                        <div class="invalid-feedback d-block text-start">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                            </div>
                        </div>
                    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const celularInput = document.getElementById('numeroCelularEstudiante');
        const dniInput = document.getElementById('dniEstudiante');

        celularInput.addEventListener('input', function () {
            // Reemplaza todo lo que no sea dígito con vacío
            this.value = this.value.replace(/\D/g, '');
        });

        dniInput.addEventListener('input', function () {
            // Reemplaza todo lo que no sea dígito con vacío
            this.value = this.value.replace(/\D/g, '');
        });
    });
</script>


                    <div class="row form-group">
                        <label class="col-md-2 col-form-label">
                            Correo electrónico <span style="color: #FF5A6A">(*)</span>
                        </label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" class="form-control @error('correoEstudiante') is-invalid @enderror" id="correoEstudiante" name="correoEstudiante" placeholder="correo@estudiante.com" maxlength="100" value="{{ old('correoEstudiante') }}" disabled>
                                    
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                @error('correoEstudiante')
                                    <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                            <label class="col-md-2 col-form-label">Dirección completa <span style="color: #FF5A6A">(*)</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control @error('calleEstudiante') is-invalid @enderror" id="calleEstudiante" name="calleEstudiante" placeholder="Avenida o calle" maxlength="20" value="{{ old('calleEstudiante') }}" disabled>
                                    @error('calleEstudiante')
                                    <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>

                        
                    </div>
                    
                </div>
                
            <div class="d-flex justify-content-center">
    <button id="btnAsignar" type="submit" class="btn btn-primary btn-block" disabled
        style="background: #FF3F3F !important; border: none;">
        <span>Asignar Representante Legal</span>
    </button>
</div>

            </form> 
    </div>
    
</div>
                </div>
            </div>
        </div>
    </div>
</div>

                        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const toggleButtons = document.querySelectorAll('.toggle-btn');

                            toggleButtons.forEach(btn => {
                                btn.addEventListener('click', function (e) {
                                    e.stopPropagation();

                                    const icon = this.querySelector('i');
                                    const targetId = this.getAttribute('data-target');
                                    const targetRow = document.querySelector(targetId);

                                    // Cerrar otras filas abiertas
                                    document.querySelectorAll('.collapse-row').forEach(row => {
                                        if (row !== targetRow) {
                                            row.classList.remove('show');
                                            const iconBtn = row.previousElementSibling.querySelector('.toggle-btn i');
                                            if (iconBtn) {
                                                iconBtn.classList.remove('fa-chevron-up');
                                                iconBtn.classList.add('fa-chevron-down');
                                            }
                                        }
                                    });

                                    // Alternar fila actual
                                    const isVisible = targetRow.classList.contains('show');
                                    if (isVisible) {
                                        targetRow.classList.remove('show');
                                        icon.classList.remove('fa-chevron-up');
                                        icon.classList.add('fa-chevron-down');
                                    } else {
                                        targetRow.classList.add('show');
                                        icon.classList.remove('fa-chevron-down');
                                        icon.classList.add('fa-chevron-up');
                                    }
                                });
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    
    <style>
    /* Estilos del loader local, no cubre toda la pantalla */
    #contenido-principal {
        position: relative;
    }

    .overlay-local {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #F9FBFD;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .spinner-container {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .circle {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        animation: float 1s infinite ease-in-out;
    }

    .c1 { background-color: #0A8CB3; animation-delay: 0s; }
    .c2 { background-color: #FF5A6A; animation-delay: 0.1s; }
    .c3 { background-color: #FFD700; animation-delay: 0.2s; }
    .c4 { background-color: #000000; animation-delay: 0.3s; }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-8px);
        }
    }
    </style>

    <script>
        $('#nuevoRegistroBtn').on('click', function () {
            $('#dniEstudiante').prop('disabled', false);
            $('#apellidoPaternoEstudiante').prop('disabled', false);
            $('#apellidoMaternoEstudiante').prop('disabled', false);
            $('#nombreEstudiante').prop('disabled', false);
            $('#parentescoRepresentante').prop('disabled', false);
            $('#calleEstudiante').prop('disabled', false);
            $('#correoEstudiante').prop('disabled', false);
            $('#ocupacionRepresentante').prop('disabled', false);
            $('#numeroCelularEstudiante').prop('disabled', false);
            $('#numeroCelularEstudiante1').prop('disabled', false);
        });
    </script>


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

    <!-- Modal de éxito -->
    <div class="modal fade" id="modalExito" tabindex="-1" role="dialog" aria-labelledby="modalExitoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-success">
        <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="modalExitoLabel">Éxito</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body text-center">
            {{ session('success') }}
        </div>
        </div>
    </div>
    </div>
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modalExito = new bootstrap.Modal(document.getElementById('modalExito'));
            modalExito.show();
        });
    </script>
    @endif
        
        <style>
        .btn-action-group button {
            margin-right: 5px;
        }

        .collapse-row {
            transition: all 0.3s ease-in-out;
            display: none;
        }

        .collapse-row.show {
            display: table-row;
        }

        .toggle-btn {
            padding: 0;
            border: none;
            background: none;
            cursor: pointer; /* Solo aquí */
        }

        .toggle-btn i {
            font-size: 0.9rem;
            color: #007bff;
            pointer-events: none; /* Para que el icono no capture eventos y se maneje en el botón */
        }

        /* Bicolor de filas */
        .table-custom tbody tr:nth-of-type(odd) {
            background-color: #f5f5f5;
        }

        .table-custom tbody tr:nth-of-type(even) {
            background-color: #e0e0e0;
        }

        /* El detalle tendrá el mismo color que la fila anterior DETALLE DE IMPARES*/
        .collapse-row.odd {
            background-color: #f5f5f5;
        }
        /* El detalle tendrá el mismo color que la fila anterior DETALLE DE PARES*/
        .collapse-row.even {
            background-color: #e0e0e0;
        }

        /* Hover en toda la fila (sin cambiar cursor) */
        .table-hover tbody tr:hover {
            background-color: #FFF4E7 !important;
        }
    </style>
        
    <style> 
    /* Paginación */
        .pagination {
            display: flex;
            justify-content: left;
            padding: 1rem 0;
            list-style: none;
            gap: 0.3rem;
        }

        .pagination li a, .pagination li span {
            color: var(--color-principal);
            border: 1px solid var(--color-principal);
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }

        .pagination li a:hover, .pagination li span:hover {
            background-color: #f1f1f1; /* Color gris cuando el cursor pasa por encima */
            color: #333;
        }

        /* Páginas activas con fondo negro */
        .pagination .page-item.active .page-link {
            background-color: #0A8CB3 !important; /* Fondo negro para la página activa */
            color: white !important; /* Texto blanco en la página activa */
            border-color: #000000 !important; /* Borde negro */
        }

        /* Páginas deshabilitadas */
        .pagination .disabled .page-link {
            color: #ccc;
            border-color: #ccc;
        }
    </style>

@endsection 