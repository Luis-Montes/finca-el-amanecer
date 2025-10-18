<div id="employees" class="module" style="display: none">
    <div class="panel panel-success">
        <div class="panel-heading">Trabajadores</div>
        <div class="panel-body">
            <button
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#modalAgregarEmpleado"
            >
                <i class="bi bi-plus-circle"></i> Agregar Trabajador
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
