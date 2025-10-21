<div id="employees" class="module" style="display: none">
    <div class="panel panel-success">
        <div class="panel-heading">Trabajadores</div>
        <div class="panel-body">
            <button class="btn btn-success" onclick="modalAgregarEmpleado('insert')" >
                <i class="bi bi-plus-circle"></i> Agregar Empleado
            </button>
            <div class="table-responsive">
                <table
                    id="table-empleados"
                    class="table table-striped table-bordered table-hover"
                >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>username</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trabajadores as $index => $trabajador)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $trabajador->username }}</td>
                            <td>{{ $trabajador->name }}</td>
                            <td>{{ $trabajador->apellidos ?? '' }}</td>
                            <td>{{ $trabajador->role }}</td>
                            <td>
                                <!-- Botón Editar -->
                                <button class="btn btn-sm btn-warning"
                                    onclick="modalAgregarEmpleado('update', '{{ $trabajador->id }}', '{{ $trabajador->username }}', '{{ $trabajador->name }}', '{{ $trabajador->apellidos }}', '{{ $trabajador->telefono }}', '{{ $trabajador->password }}', '{{ $trabajador->role }}')">
                                    Editar
                                </button>

                                <!-- Botón Eliminar -->
                                {{-- <form action="{{ route('trees.destroy', $arbol->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este arbol?')">
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
