@extends('cplantilla.bprincipal') 
@section('titulo','Registro y listado de estudiantes')
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
<style> 
    .estilo-info{
        margin-bottom: 0px;
        font-family: "Quicksand", sans-serif;
        font-weight: 700;
        font-size: clamp(0.9rem, 2.0vw, 0.9rem) !important;
       
    }
</style>

<style type="text/css" data-glamor=""></style><meta name="react-film" content="version=1.2.1-master.db29968"><meta name="botframework-webchat:bundle:variant" content="full"><meta name="botframework-webchat:bundle:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:core:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:ui:version" content="4.3.1-master.98c662f"><style type="text/css">.fancybox-margin{margin-right:10px;}</style>

<div class="container-fluid " id="contenido-principal" style="position: relative;">
      @include('ccomponentes.loader', ['id' => 'loaderPrincipal']) {{-- Usa este ID --}}

    <div class="row mt-4 ml-4 mr-4">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="box_block">
                <button class="estilo-info btn btn-block text-left rounded-0 btn_header header_6" type="button" data-toggle="collapse" data-target="#collapseExample0" aria-expanded="true" aria-controls="collapseExample" style="background: #0A8CB3 !important; font-weight: bold; color: white;">
                    <i class="fas fa-file-signature m-1"></i>&nbsp;Registro y listado de estudiantes
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                
                <div class="card-body info">
                    <div class="d-flex ">
                        <div class="@*flex-fill align-content-le*@">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <p>
                                En esta sección, podrás añadir nuevos estudiantes y consultar la información de los que ya están registrados.
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
                            <div class="col-md-6 mb-md-0 d-flex justify-content-start" style="max-width: 100%;">
                                <a href="{{ route('estudiante.create') }}" class="btn btn-primary"  id="nuevoRegistroBtn">
                                <i class="fa fa-plus mx-2 "></i> Registrar estudiante
                                </a>
                            </div>

                            <!-- Buscador a la derecha -->
                            <div class="col-md-6 d-flex justify-content-md-end justify-content-start estilo-info">
                                <form id="formBuscar" method="GET" class="w-100" style="max-width: 100%;">
                                <div class="input-group">
                                    <input id="inputBuscar" name="buscarpor" class="form-control mt-3" type="search" placeholder="Buscar por DNI o Apellidos" aria-label="Search" value="{{ $buscarpor }}" autocomplete="off" style="border-color: #F59617;">
                                    <button class="btn btn-primary nuevo-boton" type="submit" style="border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important;">
                                        <i class="fas fa-search"></i>
                                    </button>

                                </div>
                                </form>
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
                                alert('Ingrese un dato válido para realizar la búsqueda del estudiante.');
                            }
                            });
                        });
                        </script>
                        <div class="row form-bordered align-items-center"></div>

                        <div class="table-responsive mt-2">
                            <table class="table-hover table text-center" style="border: 1px solid #0A8CB3; border-radius: 10px; overflow: hidden;">
                                <thead class="  table-hover estilo-info" style="background-color: #f8f9fa; color: #0A8CB3; border:#0A8CB3 !important">
                                    <tr>
                                        <th class="text-center"style="width: 30px;"></th>      
                                        <th class="text-center" scope="col">N.° DNI</th>             
                                        <th class="text-center"scope="col">Apellidos</th>
                                        <th class="text-center"scope="col">Nombres</th>
                                        <th class="text-center"scope="col">N.° Celular</th>
                                       
                                    </tr>         
                                </thead>
                            </table>
                        </div>

                        <div id="tabla-estudiantes" style="position: relative;">
                            @include('ceinformacion.estudiantes.estudiante', ['estudiante' => $estudiante])
                        </div>
                        
        </div>
                       
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loader = document.getElementById('loaderPrincipal');
        const contenido = document.getElementById('contenido-principal');

        // Asegurarse de ocultar el loader al cargar o volver con "atrás"
        if (loader) loader.style.display = 'none';
        if (contenido) contenido.style.opacity = '1';
    });

    window.addEventListener('pageshow', function (event) {
        const loader = document.getElementById('loaderPrincipal');
        const contenido = document.getElementById('contenido-principal');

        if (loader) loader.style.display = 'none';
        if (contenido) contenido.style.opacity = '1';
    });

    document.getElementById('nuevoRegistroBtn').addEventListener('click', function (e) {
        e.preventDefault();
        const loader = document.getElementById('loaderPrincipal');
        const contenido = document.getElementById('contenido-principal');

        if (loader && contenido) {
            loader.style.display = 'flex';
            contenido.style.opacity = '0.5';
        }

        setTimeout(() => {
            window.location.href = this.href;
        }, 800);
    });
</script>




    <style>
        .btn-primary {
            margin-top: 1rem;
            background: #F6820E!important;
            border: none;
            transition: background-color 0.2s ease, transform 0.1s ease;
            margin-bottom: 0px;
            font-family: "Quicksand", sans-serif;
            font-weight: 700;
            font-size: clamp(0.9rem, 2.0vw, 0.9rem) !important;
       
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

   <script>
document.addEventListener('DOMContentLoaded', function () {
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();

        let url = $(this).attr('href');
        let buscarpor = $('#inputBuscar').val();

        const loader = document.getElementById('loaderTabla'); // apunta al loader de tabla
        const contenedor = document.getElementById('tabla-estudiantes');

        $.ajax({
            url: url,
            type: 'GET',
            data: { buscarpor: buscarpor },
            beforeSend: function () {
                loader.style.display = 'flex';
                contenedor.style.opacity = '0.5'; // opcional: efecto de atenuado
            },
            success: function (data) {
                $('#tabla-estudiantes').html(data);
            },
            complete: function () {
                loader.style.display = 'none';
                contenedor.style.opacity = '1';
            },
            error: function () {
                alert('Ocurrió un error al cargar los datos.');
            }
        });
    });
});
</script>

@endsection 