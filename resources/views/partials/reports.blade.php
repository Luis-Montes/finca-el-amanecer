<div id="reports" class="module" style="display: none">
    <!-- MÓDULO 1: Reportes Completados -->
    <div class="panel panel-success">
        <div class="panel-heading">Reportes Completados</div>
        <div class="panel-body">
            <a class="btn btn-success" href="/reports/download" download="reports.pdf">Guardar Reportes</a>
            <hr/>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Fecha Programada</th>
                            <th>Tipo</th>
                            <th>Elemento</th>
                            <th>Notas</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportes as $reporte)
                            @if($reporte->estado === 'Completada')
                                <tr>
                                    <td>{{ $reporte->fecha }}</td>
                                    <td>{{ $reporte->tipo }}</td>
                                    <td>Animal #{{ $reporte->animal_id }}</td>
                                    <td>{{ $reporte->descripcion }}</td>
                                    <td>{{ $reporte->estado }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MÓDULO 2: Reportes Programados -->
    <div class="panel panel-warning" style="margin-top: 30px;">
        <div class="panel-heading">Reportes Programados</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
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
                        @foreach($reportes as $reporte)
                            @if($reporte->estado === 'Programada')
                                <tr>
                                    <td>{{ $reporte->fecha }}</td>
                                    <td>{{ $reporte->tipo }}</td>
                                    <td>Animal #{{ $reporte->animal_id }}</td>
                                    <td>{{ $reporte->descripcion }}</td>
                                    <td>{{ $reporte->estado }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" onclick="openRegistroModal({{ $reporte->id }})">
                                            Completar
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
