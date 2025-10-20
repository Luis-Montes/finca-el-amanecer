<div id="plants" class="module" style="display: none">
    <div class="panel panel-success">
        <div class="panel-heading">Árboles</div>
        <div class="panel-body">

        <button class="btn btn-success" onclick="openArbolModal('insert')" >
            <i class="bi bi-plus-circle"></i> Agregar Árbol
        </button>

            <div class="table-responsive">
                <table
                    id="table-arboles"
                    class="table table-striped table-bordered table-hover"
                >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Especie</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($arboles as $index => $arbol)
                    {{-- <tr data-especie="{{ $arbol->especie }}" data-estado="{{ $arbol->estado }}"> --}}
                        <td>{{ $arbol->id }}</td>
                        <td>{{ $arbol->matricula }}</td>
                        <td>{{ $arbol->nombre }}</td>
                        <td>{{ $arbol->especie }}</td>
                        <td>{{ $arbol->tipo }}</td>
                        <td>{{ $arbol->estado }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-sm btn-warning"
                                onclick="openArbolModal('update', '{{ $arbol->id }}', '{{ $arbol->matricula }}', '{{ $arbol->nombre }}', '{{ $arbol->especie }}', '{{ $arbol->tipo }}', '{{ $arbol->fecha_plantacion }}', '{{ $arbol->estado }}', '{{ $arbol->observaciones }}')">
                                Editar
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('trees.destroy', $arbol->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este arbol?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


