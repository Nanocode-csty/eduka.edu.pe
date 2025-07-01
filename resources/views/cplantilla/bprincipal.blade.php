<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('titulo','Inicio | Intranet Eduka Perú')</title>
	<link rel="icon" href="{{ asset('imagenes/imgLogo.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('imagenes/imgLogo.png') }}" type="image/png">

	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	

<!-- Fonts and icons -->
	<script src="{{ asset('adminlte/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('adminlte/assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('adminlte/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('adminlte/assets/css/atlantis.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('adminlte/assets/css/demo.css') }}">
	<link href="{{ asset('Content/themes/nuna_int/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('Content/themes/nuna_int/fontawesome/css/all.css') }}">
	<link href="{{ asset('Content/themes/nuna_int/css/style_asistencia.css?f=202003171852') }}" rel="stylesheet">
	<link href="{{ asset('Content/themes/nuna_int/plugins/alertifyjs/css/themes/bootstrap.css?f=202003171852') }}" rel="stylesheet">
	<link href="{{ asset('Content/themes/nuna_int/plugins/alertifyjs/css/alertify.css?f=202003171852') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/gtm/js?id=GTM-KP42DWZ&amp;t=gtag_UA_125387370_2&amp;cid=979822549.1745649107"></script><script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-ZLTZ3530TL&amp;cx=c&amp;gtm=457e55r0za200&amp;tag_exp=101509157~102015666~103116026~103130498~103130500~103200004~103233427~103252644~103252646~104481633~104481635"></script><script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-125387370-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-125387370-2', { 'optimize_id': 'GTM-KP42DWZ' });
    </script>
    
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
            h._hjSettings = { hjid: 1431523, hjsv: 6 };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script'); r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script><script async="" src="https://static.hotjar.com/c/hotjar-1431523.js?sv=6"></script>
    <!-- Hotjar Tracking Code for http://localhost:2254/ -->

    <link href="/Content/themes/nuna_int/plugins/fancy/jquery.fancybox.css" rel="stylesheet">
    <link href="/Content/themes/nuna_int/plugins/magnific/magnific-popup.css" rel="stylesheet">
    <link href="/Content/themes/nuna_int/css/style_elements.css?f=202003171852" rel="stylesheet">
    <link href="/Content/themes/nuna_int/css/style_actividad.css?f=202003171852" rel="stylesheet">
    <link href="/Content/themes/nuna_int/css/style_ReporteSubvenciones.css?f=201910231235" rel="stylesheet">

</head>
<body>

	<style>
		body {
			background-image: url("{{ asset('imagenes/imgFondoIntranet.png') }}");

			background-size: cover;        /* o "contain", según prefieras */
			background-repeat: no-repeat;
			background-position: center;
			background-attachment: fixed;  /* si quieres que no se mueva al hacer scroll */
		}
	</style>

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" style="background-color: #0F487B;">
				
				<a class="logo">
					
				<img src="{{ asset('imagenes/Imagen1.png') }}" alt="Logo de la empresa" style="height: 70px;">
				</a>

				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			
			<!-- End Logo Header -->
<style>
.tooltip-wrapper {
  position: relative;
  display: inline-block;
}

.tooltip-wrapper .custom-tooltip {
  visibility: hidden;
  background-color: #DD1558;
  color: white;
  text-align: center;
  border-radius: 6px;
  padding: 6px 10px;
  position: absolute;
  top: 125%;
  left: 50%;
  transform: translateX(-50%);
  white-space: nowrap;
  opacity: 0;
  transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
  z-index: 9999;
}

.tooltip-wrapper .custom-tooltip::after {
  content: "";
  position: absolute;
  top: -6px;
  left: 50%;
  transform: translateX(-50%);
  border-width: 6px;
  border-style: solid;
  border-color: transparent transparent #DD1558 transparent;
}

.tooltip-wrapper:hover .custom-tooltip {
  visibility: visible;
  opacity: 1;
  transform: translateX(-50%) translateY(2px);
}
</style>
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background-color: #125592;">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<div class="tooltip-wrapper">
								<a class="nav-link" href="{{ route('rutarrr1') }}">
									<i class="fas fa-home" style="color: white"></i>
								</a>
								<div class="custom-tooltip" >Ir a inicio</div>
							</div>
						</li>
						
						<li class="nav-item dropdown hidden-caret">
							<div class="tooltip-wrapper">
								<a class="nav-link" onclick="abrirModalMensaje()">
									<i class="fa fa-envelope" style="color: white"></i>
								</a>
								<div class="custom-tooltip">¿Necesitas ayuda?</div>
							</div>
						</li>
					<!-- MODAL -->
<div id="modalMensaje" class="modal-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1050; overflow: hidden;">
  <div class="modal-content" style="background: white; margin: 5% auto; padding: 30px; border-radius: 10px; max-width: 600px; position: relative; box-shadow: 0 0 20px rgba(0,0,0,0.2);">
	<a class="logo mb-3" style="text-align: center;">
					<img src="img_eduka.png" alt="Logo de la empresa" style="height: 40px;">
				</a>
    <button class="cerrar" onclick="cerrarModalMensaje()" style="position: absolute; top: 10px; right: 15px; background: transparent; border: none; font-size: 24px; font-weight: bold; color: #aaa; cursor: pointer;">x</button>
    <h2 style="color: #28AECE; text-align: center; font-weight: bold;">
    Comunícate con nuestros Asesores
    </h2>

    <p class="text-center mb-2" style="color: #5a5a5a; font-size: 16px;">
      Soy tu tío Eduka, tu asistente virtual de Eduka Perú. Estoy aquí para ayudarte con tus consultas sobre registros, reportes y demás.
    </p>

    <form method="POST" action="{{ route('send.email') }}">
      @csrf
      <div class="form-group mb-1">
        <label for="name" class="font-weight-bold">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Tu nombre" autocomplete="off">
      </div>

      <div class="form-group mb-1">
        <label for="email" class="font-weight-bold">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="tucorreo@ejemplo.com" autocomplete="off">
      </div>

      <div class="form-group mb-1">
        <label for="message" class="font-weight-bold">Mensaje</label>
        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
      </div>

      <div class="modal-actions text-center">
        <button type="button" onclick="cerrarModalMensaje()" class="btn btn-light">Cancelar</button>
        <button type="submit" class="btn btn_blue px-4 py-2" style="border-radius: 5px;">
          <i class="fas fa-paper-plane" ></i> Enviar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function abrirModalMensaje() {
    document.getElementById('modalMensaje').style.display = 'block';
    document.body.style.overflow = 'hidden';
  }

  function cerrarModalMensaje() {
    document.getElementById('modalMensaje').style.display = 'none';
    document.body.style.overflow = 'auto';
  }
</script>


<style>
.modal-overlay {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 99999; /* ALTÍSIMO para superar cualquier fondo */
}

.modal-content {
  background: white;
  padding: 30px;
  border-radius: 10px;
  width: 600px;
  position: relative;
  font-family: Arial, sans-serif;
}

.modal-content h2 {
  font-size: 22px;
  color: #00bcd4;
  margin-bottom: 20px;
}

.modal-content label {
  display: block;
  margin-top: 10px;
  font-weight: bold;
}

.modal-content input,
.modal-content textarea {
  width: 100%;
  padding: 8px;
  margin-top: 2px;
  border: 1px solid #ccc;
  border-radius: 5px;
  border-color: #F49414;
}

.modal-actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 20px;
}

.modal-actions button {
  padding: 8px 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.modal-actions button:first-child {
  background: #ccc;
  color: white;
}

.modal-actions button:last-child {
  background: #e91e63;
  color: white;
}

.cerrar {
  position: absolute;
  top: 10px;
  right: 15px;
  border: none;
  background: transparent;
  font-size: 25px;
  cursor: pointer;
  color: #666;
}

</style>
<script>
function abrirModalMensaje() {
  document.getElementById("modalMensaje").style.display = "flex";
  document.body.style.overflow = "hidden"; // Bloquea scroll del fondo
}

function cerrarModalMensaje() {
  document.getElementById("modalMensaje").style.display = "none";
  document.body.style.overflow = "auto"; // Restaura scroll
}
</script>

						
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group" style="color: white"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn" >
								<div class="quick-actions-header">
									<span class="title mb-1">Operaciones Frecuentes</span>
									<span class="subtitle op-8">Registre adecuadamente los datos</span>
								</div>

								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="{{ route('matriculas.create') }}">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Matrícula Regular</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('adminlte/assets/img/profile.jpg') }}" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{ asset('adminlte/assets/img/profile.jpg') }}" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Ronaldo Robles</h4>
												<p class="text-muted">romero.ronaldocarlos12@gmail.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">Ver Perfil</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('adminlte/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" aria-expanded="true">
								<span>
									Ronaldo Robles
									<span class="user-level">Administrador</span>
									
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
						<!--
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>OPCIONES</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="adminlte/demo1/index.html">
											<span class="sub-item">Matrículas</span>
										</a>
									</li>
									<li>
										<a href="adminlte/demo2/index.html">
											<span class="sub-item">Notas</span>
										</a>
									</li>
									<li>
										<a href="adminlte/demo2/index.html">
											<span class="sub-item">Asistencia</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<li class="nav-item active mt-3">
							<a data-toggle="collapse" href="#matriculas1" class="collapsed" aria-expanded="false" style="background-color: #F59617 !important">
								<i class="far fa-id-card"></i>
								<p>Matrículas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="matriculas1">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('matriculas.index')}}">
											<span class="sub-item">Matrícula Regular</span>
										</a>
									</li>
									<li>
										<a href="{{route('conceptospago.index')}}">
											<span class="sub-item">Conceptos de Pagos</span>
										</a>
									</li>
									<li>
										<a href="{{route('pagos.index')}}">
											<span class="sub-item">Pagos</span>
										</a>
									</li>
								
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">OPCIONES</h4>
						</li>

						<li class="nav-item active mb-2">
							<a data-toggle="collapse" href="#base" class="collapsed" aria-expanded="false" style="background-color:#008BEA !important; color: white;">
								<i class="fas fa-grip-horizontal" style="color: white"></i>
								<p>Información</p>
								<span class="caret"></span>
							</a>

							<div class="collapse" id="base">

								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('estudiante.index')}}">
											<span class="sub-item">Registrar Estudiantes</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrardocente.index')}}">
											<span class="sub-item">Registrar Docentes</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrarasignatura.index')}}">
											<span class="sub-item">Registrar Asignaturas</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrarPeriodosEvaluacion.index')}}">
										<span class="sub-item">Registrar Periodo de Evaluación</span>
										</a>
									</li>
									<li>
										<a href="{{route('registraraula.index')}}">
											<span class="sub-item">Registrar Aulas</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrarnivel.index')}}">
											<span class="sub-item">Registrar Niveles Educativos</span>
										</a>
									</li>
									<li>
										<a href="{{route('grados.index')}}">
											<span class="sub-item">Registrar Grados</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrarcurso.index')}}">
											<span class="sub-item">Registrar Cursos</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrarseccion.index')}}">
											<span class="sub-item">Registrar Secciones</span>
										</a>
									</li><li>
										<a href="{{route('registrorepresentanteestudiante.index')}}">
											<span class="sub-item">Asignar Representante a Estudiante</span>
										</a>
									</li>
									<li>
										<a href="{{route('registraraniolectivo.index')}}">
											<span class="sub-item">Registrar Año Lectivo</span>
										</a>
									</li>
									<li>
										<a href="{{route('registrarrepresentante.index')}}">
											<span class="sub-item">Registrar Representantes</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!--
						<li class="nav-item">
							<a data-toggle="collapse" href="#matriculas">
								<i class="far fa-id-card"></i>
								<p>Matrículas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="matriculas">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('matriculas.index')}}">
											<span class="sub-item">Matrícula Regular</span>
										</a>
									</li>
									<li>
										<a href="{{route('conceptospago.index')}}">
											<span class="sub-item">Conceptos de Pagos</span>
										</a>
									</li>
									<li>
										<a href="{{route('pagos.index')}}">
											<span class="sub-item">Pagos</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
-->
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Notas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="sidebar-style-1.html">
											<span class="sub-item">Registrar Notas</span>
										</a>
									</li>
									<li>
										<a href="overlay-sidebar.html">
											<span class="sub-item">Ver Notas</span>
										</a>
									</li>
									<li>
										<a href="compact-sidebar.html">
											<span class="sub-item">Generar Reporte</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Asistencia</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="forms/forms.html">
											<span class="sub-item">Marcar Asistencia</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.html">
											<span class="sub-item">Ver Asistencia</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.html">
											<span class="sub-item">Generar Reporte</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Detalle Usuario</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="tables/tables.html">
											<span class="sub-item">Datos Personales</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-map-marker-alt"></i>
								<p>Ayuda</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Historiales</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="charts/charts.html">
											<span class="sub-item">Matrículas</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Notas</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Asistencia</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		  <div class="main-panel">
			  <div class="content">
          		@yield('contenidoplantilla')
				@if(session('modal_success'))
					<!-- Modal -->
					<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content border-success shadow-lg">
						<div class="modal-header bg-light border-0 justify-content-center">
							<img src="{{ asset('img_eduka.png') }}" alt="Logo" style="height: 60px;">
						</div>
						<div class="modal-body text-center">
							<h5 class="text-success fw-bold d-flex justify-content-center align-items-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#198754" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 11.001 8a8 8 0 0115.998 0zM6.97 11.03a.75.75 0 001.07 0l3.992-3.992a.75.75 0 00-1.06-1.06L7.5 9.44 6.1 8.03a.75.75 0 00-1.06 1.06l1.93 1.94z"/>
							</svg>
							¡Éxito!
							</h5>
							<p class="mt-2">{{ session('modal_success') }}</p>
						</div>
						<div class="modal-footer justify-content-center border-0">
							<button type="button" class="btn btn-outline-success px-4" data-bs-dismiss="modal">Aceptar</button>
						</div>
						</div>
					</div>
					</div>

					<!-- Script para mostrar el modal y cerrarlo automáticamente -->
					<script>
					document.addEventListener('DOMContentLoaded', function () {
						const modalElement = document.getElementById('successModal');
						const modal = new bootstrap.Modal(modalElement);
						modal.show();

						setTimeout(() => {
						modal.hide();
						}, 5000); // 5000 ms = 5 segundos
					});
					</script>
				@endif


			  </div>
     	  </div>

		</div>
		
		<!-- Custom template | don't include it in your project! 
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>-->
		<!-- End Custom template -->
	</div>
<!-- Core JS Files -->
<script src="{{ asset('adminlte/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('adminlte/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('adminlte/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('adminlte/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('adminlte/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('adminlte/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('adminlte/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('adminlte/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('adminlte/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('adminlte/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('adminlte/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('adminlte/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminlte/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('adminlte/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('adminlte/assets/js/atlantis.min.js') }}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('adminlte/assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('adminlte/assets/js/demo.js') }}"></script>

	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	
</body>
</html>