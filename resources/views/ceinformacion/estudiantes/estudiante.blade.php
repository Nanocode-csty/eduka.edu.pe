<!--SE UTILIZAN ETIQUETAS IDENTIFICATORIS ID U+ÚNICAS--->
<div id="tabla-estudiantes" class="table-responsive">
 @include('ccomponentes.loader', ['id' => 'loaderTabla']) {{-- otro ID único --}}
    <table id="add-row" class="table-hover table" style="border: 1px solid #0A8CB3; border-radius: 10px; overflow: hidden;">
        <tbody style="font-family: 'Quicksand', sans-serif !important;">
            @foreach($estudiante as $index => $itemRepresentante)
            <tr class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td class="text-center align-middle" >
                    <button type="button" class="toggle-btn " data-target="#collapseRow{{ $index }}" title="Ver más">
                        <i class="fas fa-chevron-down" style="color: #0A8CB3 !important;"></i>
                    </button>
                </td>
                <td class="text-center">{{ $itemRepresentante->dni }}</td>
                <td>{{ $itemRepresentante->apellidos }}</td>
                <td>{{ $itemRepresentante->nombres }}</td>
                <td class=" text-center py-2" ><div data-bind="html:DescripcionEstado"><span class="badge badge-info" style="background-color: #EC4079 !important;"> {{ $itemRepresentante->telefono }}</span></div></td>
    
            </tr>
            <tr class="collapse-row {{ $index % 2 == 0 ? 'even' : 'odd' }}" id="collapseRow{{ $index }}">
                <td colspan="5">
                    <div class="p-3 d-flex justify-content-between align-items-start" style="gap: 2rem;">

                        {{-- Columna de datos --}}
                        <div class="flex-grow-1">
                            <p><i class="icon-calendar mr-4"></i><strong>Fecha de Nacimiento: </strong> {{ $itemRepresentante->fecha_nacimiento }}</p>
                            <p><i class="icon-information mr-4"></i><strong>Género: </strong>{{ $itemRepresentante->genero == 'M' ? 'Masculino' : ($itemRepresentante->genero == 'F' ? 'Femenino' : 'No especificado') }}
                            </p>

                            <p>
                            <i class="icon-envelope mr-4"></i>
                            <strong>Correo: </strong>
                            <a href="mailto:{{ $itemRepresentante->email }}">{{ $itemRepresentante->email }}</a>
                            </p>
                            <p>
                            <i class="icon-location-pin mr-4"></i>
                            <strong>Dirección: </strong>
                            <a href="https://www.google.com/maps/search/{{ urlencode($itemRepresentante->direccion) }}" target="_blank">
                                {{ $itemRepresentante->direccion }}
                            </a>
                            </p>
                            <p><i class="icon-calendar mr-4"></i><strong>Fecha de Registro: </strong> {{ $itemRepresentante->fecha_registro }}</p>
<a href="#" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
    <i class="fas fa-file-pdf"></i> Generar ficha
</a>

                        </div>

                        {{-- Columna de imagen --}}
                        <div class="text-center" style="min-height: 160px; max-height: 160px; border: 1px solid #DF294C; padding: 2px;">
                            @php
                                // Verifica si tiene imagen, si no usa una por defecto
                                $foto = $itemRepresentante->foto_url 
                                    ? asset('storage/fotos/' . $itemRepresentante->foto_url) 
                                    : asset('storage/fotos/imgDocente.png');
                            @endphp

                            <img 
                                src="{{ $foto }}" 
                                alt="Foto del docente" 
                                class="img-thumbnail rounded" 
                                style="min-height: 150px; max-height: 150px; user-select: none;" 
                                draggable="false" 
                                oncontextmenu="return false;"
                            >
                            <p class="mt-2 fw-bold">Foto del estudiante</p>
                        </div>

                    </div>
                </td>
            </tr>
            @endforeach                                            
        </tbody>     
    </table>

    <div id="tabla-estudiantes">
        {{ $estudiante->links() }}
    </div>  
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tablaEstudiantes = document.getElementById('tabla-estudiantes');

        tablaEstudiantes.addEventListener('click', function (e) {
            const btn = e.target.closest('.toggle-btn');
            if (!btn) return;

            e.stopPropagation();

            const icon = btn.querySelector('i');
            const targetId = btn.getAttribute('data-target');
            const targetRow = document.querySelector(targetId);
            if (!targetRow) return;

            // Cierra cualquier otra fila abierta
            document.querySelectorAll('.collapse-row.show').forEach(row => {
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
                // Oculta la fila
                targetRow.classList.remove('show');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            } else {
                // Muestra la fila
                targetRow.classList.add('show');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');

                // 🔽 Desplazamiento suave a la fila
                setTimeout(() => {
                    targetRow.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 150); // Espera un poco para que se aplique .show
            }
        });
        
        // Cierra la fila activa al hacer clic fuera de la tabla
        document.addEventListener('click', function (event) {
            const tabla = document.getElementById('tabla-estudiantes');
            const isClickInside = tabla.contains(event.target);

            // Si el clic fue fuera de la tabla, cerrar cualquier fila abierta
            if (!isClickInside) {
                document.querySelectorAll('.collapse-row.show').forEach(row => {
                    row.classList.remove('show');
                    const iconBtn = row.previousElementSibling.querySelector('.toggle-btn i');
                    if (iconBtn) {
                        iconBtn.classList.remove('fa-chevron-up');
                        iconBtn.classList.add('fa-chevron-down');
                    }
                });
            }
        });
    });
</script>

<style>
    #add-row td, #add-row th {
        padding: 4px 8px;
        font-size: 14px;
        vertical-align: middle; /*alineado verticalmente al centro */
        height: 52px;
    }
</style>


<style>
    /* Oculta por defecto */
    .collapse-row {
        display: none;
        transition: all 0.3s ease;
    }

    /* Al mostrar, se vuelve visible con animación */
    .collapse-row.show {
        display: table-row;
        animation: fadeIn 0.8s ease;
    }

    /* Efecto de desvanecimiento suave */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
