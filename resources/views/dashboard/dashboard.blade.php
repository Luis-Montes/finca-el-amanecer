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
                            onclick="showModule('reports');"
                            >Reportes</a
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
    <script src="{{ asset('js/modals_historial.js') }}"></script>
    
    @include('modals.modalempleados')
    @include('modals.modalregistro');
    @include('modals.modalanimal')
    @include('modals.modalarbol');
    @include('modals.modalshistorial');


</body>
</html>
