@extends('cplantilla.bprincipal') 

@section('titulo','Año Lectivo')

@section('contenidoplantilla') 

<div class="container">     
    <div class="text-xl ms-4 ms-md-5 me-4 me-md-5 fs-4 fw-bold border-bottom mb-4 animate-slide-in">
    </div>
    <!-- Título -->
    <div class="fw-bold border-bottom mb-4 animate-slide-in">
        <h2>Listado de años lectivos registrados.</h2>
    </div>

    <style>
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in {
            animation: slideInLeft 0.8s ease-out;
        }
    </style>
         
    <style>
        .btn-primary {
            margin-top: 1rem;
            background-color: #FF4343 !important;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
                background-color: #FF4343 !important;
                transform: scale(1.02);
        }
    </style>
    
    <nav class="navbar float-right">         
        
        <form class="form-inline my-2 my-lg-0" method="GET">         
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Buscar año lectivo" arialabel="Search" value="{{ $buscarpor }}">             
            <button class="ml-2 btn btn-primary my-2 my-sm0" type="submit"><i class="fa fa-search"></i></button>         
        </form>     
    </nav>

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
        cursor: pointer;
    }

    .toggle-btn i {
        font-size: 0.9rem;
        color: #007bff;
        pointer-events: none;
    }

    /* Bicolor de filas */
    .table-custom tbody tr:nth-of-type(odd) {
        background-color: #f5f5f5;
    }

    .table-custom tbody tr:nth-of-type(even) {
        background-color: #e0e0e0;
    }

    /* El detalle tendrá el mismo color que la fila anterior */
    .collapse-row.odd {
        background-color: #f5f5f5;
    }

    .collapse-row.even {
        background-color: #e0e0e0;
    }

    /* Hover en toda la fila */
    .table-hover tbody tr:hover {
        background-color: #dbeafe !important;
    }

    /* Estilos para el estado */
    .badge {
        padding: 0.375rem 0.75rem;
        border-radius: 0.375rem;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .badge-success {
        background-color: #10b981;
        color: white;
    }
    
    .badge-warning {
        background-color: #f59e0b;
        color: white;
    }
    
    .badge-danger {
        background-color: #ef4444;
        color: white;
    }
</style>

<div class="table-responsive">
    <table id="add-row" class="display table table-hover table-custom">
        <thead class="thead-dark text-center">
            <tr>
                <th style="width: 30px;"></th>
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anoslectivos as $index => $itemAnosLectivo)
            <tr class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td class="text-center align-middle">
                    <button type="button" class="toggle-btn" data-target="#collapseRow{{ $index }}" title="Ver más">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </td>
                <td class="text-center">{{ $itemAnosLectivo->nombre }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($itemAnosLectivo->fecha_inicio)->format('d/m/Y') }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($itemAnosLectivo->fecha_fin)->format('d/m/Y') }}</td>
                <td class="text-center">
                    @if($itemAnosLectivo->estado == 'Activo')
                        <span class="badge badge-success">{{ $itemAnosLectivo->estado }}</span>
                    @elseif($itemAnosLectivo->estado == 'Inactivo')
                        <span class="badge badge-danger">{{ $itemAnosLectivo->estado }}</span>
                    @else
                        <span class="badge badge-warning">{{ $itemAnosLectivo->estado }}</span>
                    @endif
                </td>
                <td class="text-center btn-action-group">
                    <button type="button" class="btn btn-link btn-sm" title="Editar">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-link btn-danger btn-sm" title="Eliminar">
                        <i class="fa fa-times"></i>
                    </button>
                </td>
            </tr>
            <tr class="collapse-row {{ $index % 2 == 0 ? 'even' : 'odd' }}" id="collapseRow{{ $index }}">
                <td colspan="6">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <!--<p><strong>ID:</strong> {{ $itemAnosLectivo->ano_lectivo_id }}</p>-->
                                <p><strong>Nombre Completo:</strong> {{ $itemAnosLectivo->nombre }}</p>
                                <p><strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($itemAnosLectivo->fecha_inicio)->format('d/m/Y') }}</p>
                                <p><strong>Fecha de Fin:</strong> {{ \Carbon\Carbon::parse($itemAnosLectivo->fecha_fin)->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Estado:</strong> 
                                    @if($itemAnosLectivo->estado == 'Activo')
                                        <span class="badge badge-success">{{ $itemAnosLectivo->estado }}</span>
                                    @elseif($itemAnosLectivo->estado == 'Inactivo')
                                        <span class="badge badge-danger">{{ $itemAnosLectivo->estado }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $itemAnosLectivo->estado }}</span>
                                    @endif
                                </p>
                                <p><strong>Duración:</strong> 
                                    {{ \Carbon\Carbon::parse($itemAnosLectivo->fecha_inicio)->diffInDays(\Carbon\Carbon::parse($itemAnosLectivo->fecha_fin)) }} días
                                </p>
                                <p><strong>Descripción:</strong><br>
                                    {{ $itemAnosLectivo->descripcion ?? 'Sin descripción' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $anoslectivos->links() }}
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
        background-color: #f1f1f1;
        color: #333;
    }

    /* Páginas activas con fondo negro */
    .pagination .page-item.active .page-link {
        background-color: #000000 !important;
        color: white !important;
        border-color: #000000 !important;
    }

    /* Páginas deshabilitadas */
    .pagination .disabled .page-link {
        color: #ccc;
        border-color: #ccc;
    }
</style>
@endsection