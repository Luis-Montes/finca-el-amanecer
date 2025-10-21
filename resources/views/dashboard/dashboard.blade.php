<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Dashboard</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/dash.css')}}" rel="stylesheet" />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    />

</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">Finca el amanecer</a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-menu"
                aria-controls="navbar-menu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="javascript:void(0)"
                            onclick="showModule('dashboard');"
                            >Dashboard</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="javascript:void(0)"
                            onclick="showModule('animals');"
                            >Animales</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="javascript:void(0)"
                            onclick="showModule('plants');"
                            >Árboles</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="javascript:void(0)"
                            onclick="showModule('tools');"
                            >Herramientas</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="javascript:void(0)"
                            onclick="showModule('employees');"
                            >Trabajadores</a
                        >
                    </li>

                    
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="javascript:void(0)"
                            onclick="showModule('reports');"
                            >Reportes</a
                        >
                    </li>


                    <li class="nav-item">
                        <a
                            href="#"
                            class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            Cerrar sesión
                        </a>
                        <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            style="display: none"
                        >
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content-wrapper">
        <div class="container">

            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN DASHBOARD</h4>
                </div>
            </div>

            <div id="dashboard" class="module">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-info text-center">
                            <i class="fa fa-paw fa-5x"></i>
                            <h3>{{$totalAnimales}}</h3>
                            Total de Animales
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-success text-center">
                            <i class="fa fa-tree fa-5x"></i>
                            <h3>{{$totalArboles}}</h3>
                            Total de Árboles
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-warning text-center">
                            <i class="fa fa-wrench fa-5x"></i>
                            <h3>{{$totalHerramientas}}</h3>
                            Total de Herramientas
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-danger text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <h3>{{$totalTrabajadores}}</h3>
                            Total de Usuarios
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">Acciones Recientes</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Responsable</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reportes->where('estado', 'Completada') as $index => $reporte)
                                        <tr data-animal="{{ $reporte->animal_id }}">
                                            <td>{{ $reporte->updated_at }}</td>
                                            <td>{{ $reporte->tipo }}</td>
                                            <td>{{ $reporte->nombre }}</td>
                                            <td>{{ $reporte->descripcion }}</td>
                                            <td>{{ $reporte->responsable_nombre }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">Acciones Programadas</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Nombre</th>
                                                <th>Observaciones</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        @foreach($reportes->where('estado', 'Programada') as $index => $reporte)
                                        <tr data-animal="{{ $reporte->animal_id }}">
                                            <td>{{ $reporte->fecha }}</td>
                                            <td>{{ $reporte->tipo }}</td>
                                            <td>{{ $reporte->nombre }}</td>
                                            <td>{{ $reporte->observaciones }}</td>
                                            <td>{{ $reporte->estado }}</td>
                                            <td>
                                                <form action="{{ route('reportes.completar', $reporte->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Completar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row mt-4">
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="card shadow-sm p-2 text-center">
                        <h6 class="text-center mb-2">Animales por Especie</h6>
                        <div style="width: 180px; margin: 0 auto;">
                            <canvas id="chartAnimales" height="120"></canvas>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="card shadow-sm p-2 text-center">
                        <h6 class="text-center mb-2">Árboles por Especie</h6>
                        <div style="width: 180px; margin: 0 auto;">
                            <canvas id="chartArboles" height="120"></canvas>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="card shadow-sm p-2 text-center">
                        <h6 class="text-center mb-2">Herramientas por Tipo</h6>
                        <div style="width: 180px; margin: 0 auto;">
                            <canvas id="chartHerramientas" height="120"></canvas>
                        </div>
                        </div>
                    </div>
                </div>



            </div>


            

            




            @include('partials.animals')


            @include('partials.trees')

            @include('partials.tools')

            @include('partials.reports')

            @include('partials.employees')

        </div>
    </div>

    <section class="footer-section">
        <div class="container">
            <div class="col-md-12">&copy; 2025 TuDominio.com</div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/modals_animal.js') }}"></script>
    <script src="{{ asset('js/modals_empleado.js') }}"></script>
    <script src="{{ asset('js/modals_registro.js') }}"></script>
    <script src="{{ asset('js/modals_arbol.js') }}"></script>
    <script src="{{ asset('js/modals_herramienta.js') }}"></script>
    <script src="{{ asset('js/modals_historial.js') }}"></script>
    
    @include('modals.modalempleados')
    @include('modals.modalregistro');
    @include('modals.modalanimal')
    @include('modals.modalarbol');
    @include('modals.modalherramienta')
    @include('modals.modalshistorial');


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Datos desde Laravel
        const animales = @json($animalesPorEspecie);
        const arboles = @json($arbolesPorEspecie);
        const herramientas = @json($herramientasPorTipo);

        // === 1️⃣ Animales por especie ===
        new Chart(document.getElementById('chartAnimales'), {
            type: 'pie',
            data: {
                labels: animales.map(a => a.especie),
                datasets: [{
                    data: animales.map(a => a.total),
                    backgroundColor: ['#5cb85c', '#f0ad4e', '#d9534f', '#5bc0de', '#428bca']
                }]
            },
            options: {
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 10 } }
                }
            }
        });

        // === 2️⃣ Árboles por especie ===
        new Chart(document.getElementById('chartArboles'), {
            type: 'pie',
            data: {
                labels: arboles.map(a => a.especie),
                datasets: [{
                    data: arboles.map(a => a.total),
                    backgroundColor: ['#8BC34A', '#CDDC39', '#4CAF50', '#FFC107', '#009688']
                }]
            },
            options: {
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 10 } }
                }
            }
        });

        // === 3️⃣ Herramientas por tipo ===
        new Chart(document.getElementById('chartHerramientas'), {
            type: 'pie',
            data: {
                labels: herramientas.map(h => h.tipo),
                datasets: [{
                    data: herramientas.map(h => h.total),
                    backgroundColor: ['#9C27B0', '#03A9F4', '#FF9800', '#E91E63', '#795548']
                }]
            },
            options: {
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 10 } }
                }
            }
        });
    });
    </script>


</body>
</html>
