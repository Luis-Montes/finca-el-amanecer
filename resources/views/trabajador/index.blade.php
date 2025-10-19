<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido, {{ Auth::user()->username }}</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Open Sans', sans-serif;
            padding-top: 60px;
        }
        .navbar {
            background-color: #2D995B;
        }
        .navbar-brand, .navbar-nav > li > a {
            color: #fff !important;
        }
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 40px;
        }
        .table thead {
            background-color: #d4edda;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Panel de {{ Auth::user()->name }}</a>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i> Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="card">
        <h2 class="text-center">Bienvenido, {{ Auth::user()->username }}</h2>
        <p class="text-center">Tienes acceso como <strong>trabajador</strong>.</p>

        <ul class="nav nav-tabs mt-4" id="reportesTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pendientes-tab" data-bs-toggle="tab" data-bs-target="#pendientes" type="button" role="tab">Reportes Pendientes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="realizados-tab" data-bs-toggle="tab" data-bs-target="#realizados" type="button" role="tab">Reportes Realizados</button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="reportesTabsContent">
            <!-- Pendientes -->
            <div class="tab-pane fade show active" id="pendientes" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Fecha Programada</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Notas</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reportes->where('estado', 'Programada') as $reporte)
                            <tr>
                                <td>{{ $reporte->fecha }}</td>
                                <td>{{ $reporte->tipo }}</td>
                                <td>{{ $reporte->nombre }}</td>
                                <td>{{ $reporte->observaciones }}</td>
                                <td>{{ $reporte->estado }}</td>
                                <td>
                                <button 
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    onclick="openHolaModal('{{ $reporte->id }}', '{{ $reporte->tipo }}', '{{ $reporte->nombre }}', '{{ $reporte->fecha }}', '{{ $reporte->hora }}')">
                                    Realizar
                                </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Realizados -->
            <div class="tab-pane fade" id="realizados" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Responsable</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reportes->where('estado', 'Completada') as $reporte)
                            <tr>
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
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<div class="modal fade" id="holaModal" tabindex="-1" aria-labelledby="holaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="holaModalLabel" style="letter-spacing: 0.5px;">
                    Realizar Reporte
                </h5>
            </div>

            <form id="form-realizar" action="{{ route('registro.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">

                        {{-- ID del reporte --}}
                        <input type="hidden" id="reporte_id" name="reporte_id">

                        {{-- Tipo de acción --}}
                        <div class="col-md-6">
                            <label for="tipo" class="form-label fw-semibold">Tipo de Acción *</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="tipo" name="tipo" readonly>
                        </div>

                        {{-- Nombre de la acción --}}
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre *</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="nombre" name="nombre" readonly>
                        </div>

                        {{-- Fecha --}}
                        <div class="col-md-6">
                            <label for="fecha" class="form-label fw-semibold">Fecha *</label>
                            <input type="date" class="form-control rounded-3 shadow-sm input-hover" id="fecha" name="fecha" readonly>
                        </div>

                        {{-- Hora --}}
                        <div class="col-md-6">
                            <label for="hora" class="form-label fw-semibold">Hora *</label>
                            <input type="time" class="form-control rounded-3 shadow-sm input-hover" id="hora" name="hora" readonly>
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-12">
                            <label for="observaciones" class="form-label fw-semibold">Observaciones *</label>
                            <textarea class="form-control rounded-3 shadow-sm input-hover" id="observaciones" name="observaciones" rows="3" required></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-top-0 justify-content-between p-3">
                    <button type="button" class="btn btn-light text-secondary rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success rounded-3 px-4">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.input-hover {
    transition: all 0.25s ease;
}
.input-hover:focus {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-color: #2D995B;
}

.modal.fade .modal-dialog {
    transform: translateY(-20px);
    transition: transform 0.3s ease-out, opacity 0.3s ease;
}
.modal.fade.in .modal-dialog {
    transform: translateY(0);
}

.modal-content.shadow-lg {
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}
</style>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT -->
<script>
function openHolaModal(id, tipo, nombre, fecha, hora) {
    document.getElementById('reporte_id').value = id;
    document.getElementById('tipo').value = tipo;
    document.getElementById('nombre').value = nombre;
    document.getElementById('fecha').value = fecha;
    document.getElementById('hora').value = hora;

    const modalEl = document.getElementById('holaModal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
}
</script>




</body>
</html>
