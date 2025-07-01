@extends('cplantilla.bprincipal') 

@section('titulo','Registrar Aulas')

@section('contenidoplantilla') 

<div class="container">     
    <div class="text-xl ms-4 ms-md-5 me-4 me-md-5 fs-4 fw-bold border-bottom mb-4 animate-slide-in">
    </div>
    <!-- Título -->
    <div class="fw-bold border-bottom mb-4 animate-slide-in">
        <h2>Listado de aulas.</h2>
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
         
  
    
    <nav class="navbar float-right">         
        
    <form class="form-inline my-2 my-lg-0" method="GET">         
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Buscar Nombre" arialabel="Search" value="{{ $buscarpor }}">             
            <button class="ml-2 btn btn-primary my-2 my-sm0" type="submit"><i class="fa fa-search"></i></button>         
        </form>     
    </nav>
    
    <div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover" >
        <thead class="thead-dark text-center">         
            <tr>             
                <th scope="col">ID</th>            
                <th scope="col">Nombre</th>
                <th scope="col">Capacidad</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Tipo</th>
            </tr>         
        </thead>

        <tbody>
            @foreach($aulas as $itemAula)                                            
                <tr>                                         
                    <td class="text-center">{{ $itemAula->aula_id }}</td>
                    <td>{{ $itemAula->nombre }}</td>
                    <td class="text-center">{{ $itemAula->capacidad }}</td>
                    <td>{{ $itemAula->ubicacion ?? 'No definida' }}</td>
                    <td>{{ $itemAula->tipo }}</td>                                               
                </tr>                  
            @endforeach         
        </tbody>     
    </table>
    {{ $aulas->links() }}  
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
<style type="text/css" data-glamor=""></style><meta name="react-film" content="version=1.2.1-master.db29968"><meta name="botframework-webchat:bundle:variant" content="full"><meta name="botframework-webchat:bundle:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:core:version" content="4.3.1-master.98c662f"><meta name="botframework-webchat:ui:version" content="4.3.1-master.98c662f"><style type="text/css">.fancybox-margin{margin-right:10px;}</style></head>

<div class="container">
    <div class="row mb-3 mt-4">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="box_block">
                <button class="btn btn-primary btn-block text-left rounded-0 btn_header header_4" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample">
                    <i class="fas fa-file-signature"></i>&nbsp;Mi número de cuenta bancaria
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                <div class="card-body info">
                    <div class="d-flex ">
                        <div class="@*flex-fill align-content-le*@">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <p>
                                Si ya tiene número de cuenta, debe recoger su tarjeta bancaria y Clave en el Banco de la Nación, en caso ya lo realizó omita este mensaje.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="collapse show" id="collapseExample1">
                    <div class="card card-body rounded-0 border-0">
                        <div class="row">
                                <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-2 offset-xl-3 offset-lg-3  text-right">
                                    Número de Cuenta:
                                </div>
                                <div class="col-6 col-md-6 col-sm-6 col-lg-5 col-xl-5">
                                    <span style="    font-family: 'Quicksand', sans-serif; font-weight: 600;color:#004a92;">04-082-763339</span>
                                </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="box_block">
                <button class="btn btn-primary btn-block text-left rounded-0 btn_header header_6" type="button" data-toggle="collapse" data-target="#collapseExample0" aria-expanded="true" aria-controls="collapseExample">
                    <i class="fas fa-file-signature"></i>&nbsp;Consulta de historial de pago de subvenciones
                    <div class="float-right"><i class="fas fa-chevron-down"></i></div>
                </button>
                <div class="card-body info">
                    <div class="d-flex ">
                        <div class="@*flex-fill align-content-le*@">
                            <i class="fas fa-exclamation-circle fa-2x"></i>
                        </div>
                        <div class="p-2 flex-fill">
                            <p>
                                En esta sección, podrás consultar el estado e historial de tus subvenciones.
                            </p>
                            <p>
                                Estimado Talento: La fecha de transferencia indica la solicitud de deposito a tu cuenta bancaria del Banco de la Nación. En ese sentido, desde la fecha de Transferencia a cuenta bancaria del Becario, debes considerar hasta 5 días hábiles para que la subvención se encuentre disponible en tu cuenta.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="collapse show" id="collapseExample0">
                    <div class="card card-body rounded-0 border-0 pt-0 pb-2">
                        <form name="#FormDnie">
                            <div class="row form-bordered align-items-center">
                                <div class="col-12 col-md-12 col-sm-12 col-lg-2 col-xl-2">
                                    Selecciona año
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-2 col-xl-2">
                                    <select class="form-control" id="Id_Periodo">
                                        <option value="">- AÑO -</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025" selected="">2025</option>
                                            <option value="2026">2026</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                       
                        <div class="table-responsive d-flex flex-column align-items-center">
                            <table class="table table-hover tableListado " style="max-width:900px" id="tblReporteSubvencion">
                                <thead>
                                    <tr class="rounded-top">
                                        <th class="tableheadercolor text-center py-2" style="width:220px;">
                                            <b>Mes</b>
                                        </th>
                                        <th class="tableheadercolor text-right py-2">
                                            <b>Monto</b>
                                        </th>
                                        <th class="tableheadercolor text-center py-2 ">
                                            <b>Fecha</b>
                                        </th>
                                        <th class="tableheadercolor text-center py-2 " style="width:190px;">
                                            <b>Estado</b>
                                        </th>
                                        <th class="tableheadercolor text-right py-2">
                                            <b>Boleta de Pago</b>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody data-bind="foreach : formatos, visible:formatos().length>0" >
                                    <tr>
                                        <td class="text-lg-center py-2" style="font-weight: 500;"><span data-bind="text:MESES_SOLICITUD">JUNIO</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Moneda">S/.</span> <span data-bind="text:Monto">1056</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Fecha_Tesoreria">08/05/2025</span> </td>
                                        <td class=" text-center py-2"><div data-bind="html:DescripcionEstado"><span class="badge badge-info">Transferencia a cuenta bancaria del becario</span></div></td>
                                        <td class=" text-right py-0"><a href="javascript:void(0)" data-bind="click:$root.ver_boleta"><i cl="" ass="fas fa-search"></i></a></td>

                                    </tr>
                                
                                    <tr>
                                        <td class="text-lg-center py-2" style="font-weight: 500;"><span data-bind="text:MESES_SOLICITUD">MAYO</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Moneda">S/.</span> <span data-bind="text:Monto">1056</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Fecha_Tesoreria">02/04/2025</span> </td>
                                        <td class=" text-center py-2"><div data-bind="html:DescripcionEstado"><span class="badge badge-info">Transferencia a cuenta bancaria del becario</span></div></td>
                                        <td class=" text-right py-0"><a href="javascript:void(0)" data-bind="click:$root.ver_boleta"><i cl="" ass="fas fa-search"></i></a></td>

                                    </tr>
                                
                                    <tr>
                                        <td class="text-lg-center py-2" style="font-weight: 500;"><span data-bind="text:MESES_SOLICITUD">ABRIL</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Moneda">S/.</span> <span data-bind="text:Monto">1056</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Fecha_Tesoreria">04/03/2025</span> </td>
                                        <td class=" text-center py-2"><div data-bind="html:DescripcionEstado"><span class="badge badge-info">Transferencia a cuenta bancaria del becario</span></div></td>
                                        <td class=" text-right py-0"><a href="javascript:void(0)" data-bind="click:$root.ver_boleta"><i cl="" ass="fas fa-search"></i></a></td>

                                    </tr>
                                
                                    <tr>
                                        <td class="text-lg-center py-2" style="font-weight: 500;"><span data-bind="text:MESES_SOLICITUD">FEBRERO-MARZO</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Moneda">S/.</span> <span data-bind="text:Monto">2112</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Fecha_Tesoreria">07/02/2025</span> </td>
                                        <td class=" text-center py-2"><div data-bind="html:DescripcionEstado"><span class="badge badge-info">Transferencia a cuenta bancaria del becario</span></div></td>
                                        <td class=" text-right py-0"><a href="javascript:void(0)" data-bind="click:$root.ver_boleta"><i cl="" ass="fas fa-search"></i></a></td>

                                    </tr>
                                
                                    <tr>
                                        <td class="text-lg-center py-2" style="font-weight: 500;"><span data-bind="text:MESES_SOLICITUD">ENERO</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Moneda">S/.</span> <span data-bind="text:Monto">1056</span></td>
                                        <td class=" text-right py-2"><span data-bind="text:Fecha_Tesoreria">26/12/2024</span> </td>
                                        <td class=" text-center py-2"><div data-bind="html:DescripcionEstado"><span class="badge badge-info">Transferencia a cuenta bancaria del becario</span></div></td>
                                        <td class=" text-right py-0"><a href="javascript:void(0)" data-bind="click:$root.ver_boleta"><i cl="" ass="fas fa-search"></i></a></td>

                                    </tr>
                                </tbody>
                                <!-- ko if: formatos().length==0 --><!-- /ko -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <br>

        </div>

    </div>

@endsection