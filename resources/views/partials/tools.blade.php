<div id="tools" class="module" style="display: none">
    <div class="panel panel-success">
        <div class="panel-heading">Herramientas</div>
        <div class="panel-body">

        <button class="btn btn-success" onclick="openHerramientaModal('insert')" >
            <i class="bi bi-plus-circle"></i> Agregar Herramienta
        </button>

            <div class="table-responsive">
                <table
                    id="table-herramientas"
                    class="table table-striped table-bordered table-hover"
                >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Ultima Acción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($herramientas as $index => $herramienta)
                        <td>{{ $herramienta->id }}</td>
                        <td>{{ $herramienta->matricula }}</td>
                        <td>{{ $herramienta->nombre }}</td>
                        <td>{{ $herramienta->tipo }}</td>
                        <td>{{ $herramienta->especie }}</td>
                        <td>{{ $herramienta->fecha_plantacion }}</td>
                        <td>{{ $herramienta->estado }}</td>
                        <td>{{ $herramienta->observaciones }}</td>
                        <td>
                            {{-- <!-- Botón Editar -->
                            <button class="btn btn-sm btn-warning"
                                onclick="openherramientaModal('{{ $herramienta->id }}', '{{ $herramienta->matricula }}', '{{ $herramienta->nombre }}', '{{ $herramienta->especie }}', '{{ $herramienta->raza }}', '{{ $herramienta->fecha_nacimiento }}', '{{ $herramienta->sexo }}', '{{ $herramienta->estado }}', `{{ $herramienta->observaciones }}`)">
                                Editar
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('herramientas.destroy', $herramienta->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este herramienta?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
