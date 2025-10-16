<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Dashboard</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/dash.css')}}" rel="stylesheet" />
</head>
<body>

    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.png" />
                </a>
            </div>
        </div>
    </div>

    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="javascript:void(0)" onclick="showModule('dashboard');">Dashboard</a></li>
                            <li><a href="javascript:void(0)" onclick="showModule('animals');">Animales</a></li>
                            <li><a href="javascript:void(0)" onclick="showModule('plants');">Árboles</a></li>
                            <li><a href="javascript:void(0)" onclick="showModule('tools');">Herramientas</a></li>
                            <li><a href="javascript:void(0)" onclick="showModule('reports');">Reportes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="container">

            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN DASHBOARD</h4>
                </div>
            </div>

            <div id="dashboard" class="module">
                <!-- Iconos -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-info text-center">
                            <i class="fa fa-paw fa-5x"></i>
                            <h3>500</h3>
                            Total de Animales
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-success text-center">
                            <i class="fa fa-tree fa-5x"></i>
                            <h3>300</h3>
                            Total de Árboles
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-warning text-center">
                            <i class="fa fa-wrench fa-5x"></i>
                            <h3>56</h3>
                            Total de Herramientas
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="alert alert-danger text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <h3>30</h3>
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
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>User No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>1</td><td>Mark</td><td>Otto</td><td>@mdo</td><td>100090</td></tr>
                                            <tr><td>2</td><td>Jacob</td><td>Thornton</td><td>@fat</td><td>100091</td></tr>
                                            <tr><td>3</td><td>Larry</td><td>the Bird</td><td>@twitter</td><td>100092</td></tr>
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
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>User No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>1</td><td>Anna</td><td>Smith</td><td>@anna</td><td>200001</td></tr>
                                            <tr><td>2</td><td>Bob</td><td>Jones</td><td>@bob</td><td>200002</td></tr>
                                            <tr><td>3</td><td>Carol</td><td>Lee</td><td>@carol</td><td>200003</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="module" id="animals" style="display:none;">
        <h3>Animales</h3>

        <div class="row g-2 mb-3">
            <div class="col-md-4">
                <select id="filter-especie" class="form-select">
                    <option value="">Todas las especies</option>
                    @foreach($especies as $especie)
                        <option value="{{ $especie }}">{{ $especie }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <select id="filter-estado" class="form-select">
                    <option value="">Todos los estados</option>
                    @foreach($estados as $est)
                        <option value="{{ $est }}">{{ $est }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-animales">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animales as $index => $animal)
                    <tr data-especie="{{ $animal->especie }}" data-estado="{{ $animal->estado }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $animal->matricula }}</td>
                        <td>{{ $animal->nombre }}</td>
                        <td>{{ $animal->especie }}</td>
                        <td>{{ $animal->raza }}</td>
                        <td>{{ $animal->fecha_nacimiento }}</td>
                        <td>{{ $animal->estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



            <div id="plants" class="module" style="display:none;">
                <div class="panel panel-success">
                    <div class="panel-heading">Árboles</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead><tr><th>#</th><th>Árbol</th><th>Altura</th></tr></thead>
                                <tbody>
                                    <tr><td>1</td><td>Roble</td><td>20m</td></tr>
                                    <tr><td>2</td><td>Pino</td><td>25m</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tools" class="module" style="display:none;">
                <div class="panel panel-success">
                    <div class="panel-heading">Herramientas</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead><tr><th>#</th><th>Herramienta</th><th>Cantidad</th></tr></thead>
                                <tbody>
                                    <tr><td>1</td><td>Martillo</td><td>15</td></tr>
                                    <tr><td>2</td><td>Destornillador</td><td>30</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="reports" class="module" style="display:none;">
                <div class="panel panel-success">
                    <div class="panel-heading">Reportes</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead><tr><th>#</th><th>Reporte</th><th>Fecha</th></tr></thead>
                                <tbody>
                                    <tr><td>1</td><td>Reporte 1</td><td>15/10/2025</td></tr>
                                    <tr><td>2</td><td>Reporte 2</td><td>16/10/2025</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="footer-section">
        <div class="container">
            <div class="col-md-12">&copy; 2025 TuDominio.com</div>
        </div>
    </section>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/dashboard.js"></script>

    </script>
</body>
</html>
