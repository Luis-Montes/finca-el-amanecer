<html>
    <body>
        <div class="panel panel-success">
            <div class="panel-heading">Reportes</div>
            <div class="panel-body">
                <hr/>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>