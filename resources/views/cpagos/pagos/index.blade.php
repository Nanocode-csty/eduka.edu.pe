@extends('cplantilla.bprincipal')
@section('titulo', 'Registro y listado de pagos')
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

<style type="text/css" data-glamor=""></style><meta name="react-film" content="version=1.2.1-master.db29968"><meta name="botframework-webchat:bundle:variant" content="full"><meta name="botframework-webchat:bundle:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:core:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:ui:version" content="4.3.1-master.98c662f"><style type="text/css">.fancybox-margin{margin-right:10px;}</style>

<div class="container-fluid" id="contenido-principal">
    <div class="row mt-4 ml-4 mr-4">
        <div class="col-12">
            <div class="box_block">
                <button class="btn btn-block text-left rounded-0 btn_header header_6" type="button" data-toggle="collapse" data-target="#collapsePagos" aria-expanded="true" aria-controls="collapsePagos" style="background: #0A8CB3 !important; font-weight: bold; color: white;">
                    <i class="fas fa-money-check-alt m-1"></i>&nbsp;Registro y listado de pagos
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                <div class="card-body info">
                    <div class="d-flex">
                        <div>
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <p>
                                En esta sección, podrás registrar nuevos pagos y consultar la información de los pagos ya registrados.
                            </p>
                            <p>
                                Estimado Usuario: Revisa cuidadosamente los datos antes de guardar. Los pagos registrados afectan la gestión financiera del estudiante.
                                Es necesario ver los detalles definidos en la pestaña de <strong>Conceptos de Pagos</strong> para asegurar que el pago se registre correctamente.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="collapse show" id="collapsePagos">
                    <div class="card card-body rounded-0 border-0 pt-0 pb-2">
                        <div class="row align-items-center">
                            <!-- Botón a la izquierda -->
                            <div class="col-md-4 mb-md-0 d-flex justify-content-start mt-2">
                                <a href="{{ route('pagos.create') }}" class="btn btn-primary" id="nuevoPagoBtn">
                                    <i class="fa fa-plus mx-2"></i> Registrar pago
                                </a>
                            </div>
                            <!-- Buscador a la derecha -->
                            <div class="col-md-8 d-flex justify-content-md-end justify-content-start">
                                <form id="formBuscarPago" method="GET" action="{{ route('pagos.index') }}" class="w-100">
                                    <div class="input-group">
                                        <input id="inputBuscarPago" name="buscarpor" class="form-control mt-3" type="search" placeholder="Buscar por código de transacción" aria-label="Buscar" value="{{ $buscarpor }}" autocomplete="off">
                                        <button class="btn btn-primary mt-3" type="submit" style="border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Loader oculto -->
                        <div id="loaderAnimadoPago" style="display: none;">
                            <div class="overlay-local">
                                <div class="spinner-container">
                                    <span class="circle c1"></span>
                                    <span class="circle c2"></span>
                                    <span class="circle c3"></span>
                                    <span class="circle c4"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-bordered align-items-center"></div>
                        <!-- Tabla de pagos -->
                        <div class="table-responsive mt-2">
                            <table class="table-hover table" style="border: 1px solid #0A8CB3; border-radius: 10px; overflow: hidden;">
                                <thead class="text-center table-hover" style="background-color: #f8f9fa; color: #0A8CB3;">
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th>Código Transacción</th>
                                        <th>Matrícula</th>
                                        <th>Concepto</th>
                                        <th>Monto</th>
                                        <th>Fecha Vencimiento</th>
                                        <th>Fecha Pago</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagos as $index => $pago)
                                    <tr class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                                        <td class="text-center align-middle">
                                            <button type="button" class="toggle-btn" data-target="#collapsePago{{ $index }}" title="Ver más">
                                                <i class="fas fa-chevron-down" style="color: #0A8CB3 !important;"></i>
                                            </button>
                                        </td>
                                        <td class="text-center">{{ $pago->codigo_transaccion }}</td>
                                        <td>{{ $pago->matricula->numero_matricula ?? 'N/A' }}</td>
                                        <td>{{ $pago->concepto->nombre ?? 'N/A' }}</td>
                                        <td class="text-center">{{ number_format($pago->monto, 2) }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($pago->fecha_vencimiento)->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            @if($pago->fecha_pago)
                                                {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}
                                            @else
                                                <span class="text-muted">Pendiente</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pago->estado == 'Pagado')
                                                <span class="badge bg-success">{{ $pago->estado }}</span>
                                            @elseif($pago->estado == 'Pendiente')
                                                <span class="badge bg-warning">{{ $pago->estado }}</span>
                                            @elseif($pago->estado == 'Anulado')
                                                <span class="badge bg-danger">{{ $pago->estado }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $pago->estado }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center btn-action-group">
                                            <a href="{{ route('pagos.show', $pago->pago_id) }}" class="btn btn-info btn-sm" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('pagos.edit', $pago->pago_id) }}" class="btn btn-warning btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('pagos.destroy', $pago->pago_id) }}" style="display: inline-block;" onsubmit="return confirmarEliminacionPago('{{ $pago->codigo_transaccion }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" @if($pago->estado == 'Pagado') disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr class="collapse-row {{ $index % 2 == 0 ? 'even' : 'odd' }}" id="collapsePago{{ $index }}">
                                        <td colspan="9">
                                            <div class="p-3">
                                                <p><strong>Método de Pago:</strong> {{ $pago->metodo_pago ?? 'N/A' }}</p>
                                                <p><strong>Comprobante:</strong>
                                                    @if($pago->comprobante_url)
                                                        <a href="{{ $pago->comprobante_url }}" target="_blank">Ver comprobante</a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </p>
                                                <p><strong>Observaciones:</strong> {{ $pago->observaciones ?? '-' }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $pagos->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <br>
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

    // Confirmar eliminación de pago
    function confirmarEliminacionPago(codigo) {
        return confirm('¿Estás seguro de que deseas eliminar el pago con código "' + codigo + '"?\n\nEsta acción no se puede deshacer.');
    }

    // Validar búsqueda
    document.addEventListener('DOMContentLoaded', function () {
        const formBuscar = document.getElementById('formBuscarPago');
        const inputBuscar = document.getElementById('inputBuscarPago');
        formBuscar.addEventListener('submit', function (e) {
            if (inputBuscar.value.trim() === '') {
                e.preventDefault();
                alert('Por favor, ingresa texto para buscar.');
            }
        });

        // Toggle detalles
        const toggleButtons = document.querySelectorAll('.toggle-btn');
        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                const targetId = this.getAttribute('data-target');
                const targetRow = document.querySelector(targetId);
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

        // Loader para nuevo pago
        document.getElementById('nuevoPagoBtn').addEventListener('click', function (e) {
            e.preventDefault();
            const loader = document.getElementById('loaderAnimadoPago');
            const section = document.getElementById('contenido-principal');
            loader.style.display = 'block';
            section.style.visibility = 'hidden';
            loader.style.visibility = 'visible';
            setTimeout(() => {
                window.location.href = this.href;
            }, 800);
        });

        // Ocultar loader si vienes de cache
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                const loader = document.getElementById('loaderAnimadoPago');
                const section = document.getElementById('contenido-principal');
                if (loader) loader.style.display = 'none';
                if (section) section.style.visibility = 'visible';
            }
        });
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
    .btn-action-group button { margin-right: 5px; }
    .collapse-row { transition: all 0.3s ease-in-out; display: none; }
    .collapse-row.show { display: table-row; }
    .toggle-btn { padding: 0; border: none; background: none; cursor: pointer; }
    .toggle-btn i { font-size: 0.9rem; color: #007bff; pointer-events: none; }
    .table-hover tbody tr:hover { background-color: #FFF4E7 !important; }
    .collapse-row.odd { background-color: #f5f5f5; }
    .collapse-row.even { background-color: #e0e0e0; }
    /* Loader */
    #contenido-principal { position: relative; }
    .overlay-local {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: #F9FBFD; display: flex; justify-content: center; align-items: center; z-index: 10;
    }
    .spinner-container { display: flex; justify-content: center; gap: 10px; }
    .circle { width: 12px; height: 12px; border-radius: 50%; animation: float 1s infinite ease-in-out; }
    .c1 { background-color: #0A8CB3; animation-delay: 0s; }
    .c2 { background-color: #FF5A6A; animation-delay: 0.1s; }
    .c3 { background-color: #FFD700; animation-delay: 0.2s; }
    .c4 { background-color: #000000; animation-delay: 0.3s; }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    /* Paginación */
    .pagination { display: flex; justify-content: left; padding: 1rem 0; list-style: none; gap: 0.3rem; }
    .pagination li a, .pagination li span {
        color: var(--color-principal); border: 1px solid var(--color-principal);
        padding: 6px 12px; border-radius: 4px; text-decoration: none; transition: all 0.2s ease; font-size: 0.9rem;
    }
    .pagination li a:hover, .pagination li span:hover { background-color: #f1f1f1; color: #333; }
    .pagination .page-item.active .page-link {
        background-color: #0A8CB3 !important; color: white !important; border-color: #000000 !important;
    }
    .pagination .disabled .page-link { color: #ccc; border-color: #ccc; }
</style>
@endsection
