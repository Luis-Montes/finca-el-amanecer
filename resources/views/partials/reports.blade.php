<div id="reports" class="module" style="display: none">
    <div class="panel panel-success">
        <div class="panel-heading">Reportes</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table
                    id="table-empleados"
                    class="table table-striped table-bordered table-hover"
                >
                    <thead>
                        <tr>
                            <th>Fecha Programada</th>
                            <th>Tipo</th>
                            <th>Elemento</th>
                            <th>Notas</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportes as $index => $reporte)
                        <tr>
                            <td>{{ $reporte->fecha }}</td>
                            <td>{{ $reporte->tipo }}</td>
                            <td>Animal #{{ $reporte->animal_id }}</td>
                            <td>{{ $reporte->descripcion }}</td>
                            <td>{{ $reporte->estado }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="openRegistroModal({{ $reporte->id }})">Completar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
