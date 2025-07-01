@extends('cplantilla.bprincipal') 
@section('titulo','Registrar Docentes')
@section('contenidoplantilla') 


<!--MAL----------------------------------------------------------------------------------------------------------------------------------------->
<div class="container">     
    <div class="text-xl ms-4 ms-md-5 me-4 me-md-5 fs-4 fw-bold border-bottom mb-4 animate-slide-in">
    </div>
    <!-- Título -->
    <div class="fw-bold border-bottom mb-4 animate-slide-in">
        <h2>Listado de docentes registrados (2025-I)</h2>
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
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Buscar DNI/Apellidos" arialabel="Search" value="{{ $buscarpor }}">             
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

    /* El detalle tendrá el mismo color que la fila anterior */
    .collapse-row.odd {
        background-color: #f5f5f5;
    }

    .collapse-row.even {
        background-color: #e0e0e0;
    }

    /* Hover en toda la fila (sin cambiar cursor) */
    .table-hover tbody tr:hover {
        background-color: #dbeafe !important;
    }
</style>

<div class="table-responsive">
    <table id="add-row" class="display table table-hover table-custom">
        <thead class="thead-dark text-center">
            <tr>
                <th style="width: 30px;"></th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Especialidad</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($docente as $index => $itemDocente)
            <tr class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td class="text-center align-middle">
                    <button type="button" class="toggle-btn" data-target="#collapseRow{{ $index }}" title="Ver más">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </td>
                <td class="text-center">{{ $itemDocente->dni }}</td>
                <td>{{ $itemDocente->nombres }}</td>
                <td>{{ $itemDocente->apellidos }}</td>
                <td class="text-center">{{ $itemDocente->especialidad }}</td>
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
        <div class="p-3 d-flex justify-content-between align-items-start" style="gap: 2rem;">

            {{-- Columna de datos --}}
            <div class="flex-grow-1">
                <p><strong>Fecha de Nacimiento:</strong> {{ $itemDocente->fecha_nacimiento }}</p>
                <p><strong>Género:</strong> {{ $itemDocente->genero }}</p>
                <p><strong>Dirección:</strong> {{ $itemDocente->direccion }}</p>
                <p><strong>Teléfono:</strong> {{ $itemDocente->telefono }}</p>
                <p><strong>Correo:</strong> {{ $itemDocente->email }}</p>
                <p><strong>Fecha de Contratación:</strong> {{ $itemDocente->fecha_contratacion }}</p>
            </div>
{{-- Columna de imagen --}}
<div class="text-center" style="min-width: 160px;">
    <img 
        src="{{ asset($itemDocente->foto_url) }}" 
        alt="Foto del docente" 
        class="img-thumbnail rounded" 
        style="max-width: 150px; user-select: none;" 
        draggable="false" 
        oncontextmenu="return false;"
    >
    <p class="mt-2 fw-bold">Foto</p>
</div>

        </div>
    </td>
</tr>

            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $docente->links() }}
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
        background-color: #f1f1f1; /* Color gris cuando el cursor pasa por encima */
        color: #333;
    }

    /* Páginas activas con fondo negro */
    .pagination .page-item.active .page-link {
        background-color: #000000 !important; /* Fondo negro para la página activa */
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