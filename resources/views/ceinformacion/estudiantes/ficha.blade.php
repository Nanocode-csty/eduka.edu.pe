<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha Escolar del Estudiante</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
        }

        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .seccion {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
        }

        .info {
            width: 100%;
            border-collapse: collapse;
        }

        .info td {
            padding: 5px;
            vertical-align: top;
        }

        .foto {
            width: 120px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #000;
        }

        .subtitulo {
            font-weight: bold;
            font-size: 14px;
            background-color: #f0f0f0;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    {{-- Encabezado --}}
    <div class="encabezado">
        <img src="{{ public_path('imagenes/logo_colegio.png') }}" alt="Logo" class="logo">
        <div style="flex: 1; text-align: center;">
            <div style="font-size: 16px;">Nombre de la Institución Educativa</div>
            <div style="font-size: 13px;">Dirección | Teléfono | Correo</div>
        </div>
        <div style="width: 80px;"></div>
    </div>

    <div class="titulo">FICHA ESCOLAR DEL ESTUDIANTE</div>

    {{-- Foto del estudiante --}}
    @php
        $rutaFoto = public_path('fotos_estudiantes/' . $estudiante->foto_url);
        $fotoExiste = $estudiante->foto_url && file_exists($rutaFoto);
    @endphp

    <div class="seccion">
        <table class="info">
            <tr>
                <td style="width: 70%;">
                    <div class="subtitulo">Datos Personales</div>
                    <p><span class="label">DNI:</span> {{ $estudiante->dni }}</p>
                    <p><span class="label">Nombres:</span> {{ $estudiante->nombres }}</p>
                    <p><span class="label">Apellidos:</span> {{ $estudiante->apellidos }}</p>
                    <p><span class="label">Fecha de Nacimiento:</span> {{ $estudiante->fecha_nacimiento }}</p>
                    <p><span class="label">Género:</span> {{ $estudiante->genero == 'M' ? 'Masculino' : 'Femenino' }}</p>
                    <p><span class="label">Dirección:</span> {{ $estudiante->direccion ?? '-' }}</p>
                    <p><span class="label">Celular:</span> {{ $estudiante->telefono ?? '-' }}</p>
                    <p><span class="label">Correo:</span> {{ $estudiante->email ?? '-' }}</p>
                    <p><span class="label">Fecha de Registro:</span> {{ $estudiante->fecha_registro }}</p>
                </td>
                <td style="width: 30%; text-align: center;">
                    <div style="margin-bottom: 5px;">Foto del estudiante</div>
                    @if($fotoExiste)
                        <img src="{{ $rutaFoto }}" class="foto">
                    @else
                        <img src="{{ public_path('imagenes/default_user.png') }}" class="foto">
                    @endif
                </td>
            </tr>
        </table>
    </div>

    {{-- Representante --}}
    @if($estudiante->representante)
        <div class="seccion">
            <div class="subtitulo">Datos del Representante</div>
            <p><span class="label">Nombre:</span> {{ $estudiante->representante->nombre }}</p>
            <p><span class="label">Parentesco:</span> {{ $estudiante->representante->parentesco }}</p>
            <p><span class="label">DNI:</span> {{ $estudiante->representante->dni }}</p>
            <p><span class="label">Teléfono:</span> {{ $estudiante->representante->telefono }}</p>
        </div>
    @endif

</body>
</html>
