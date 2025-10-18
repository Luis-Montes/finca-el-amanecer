<div class="modal fade" id="modalHistorial" tabindex="-1" aria-labelledby="modalHistorialLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="modalHistorialLabel" style="letter-spacing: 0.5px;">
                    Historial del Animal
                </h5>
            </div>

            <div class="modal-body">
                <form id="form-registro">
                    <input type="hidden" id="animal_id" name="animal_id">

                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">ID:</label>
                            <input type="text" id="animal_id_display" class="form-control rounded-3 shadow-sm input-hover" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Matrícula:</label>
                            <input type="text" id="animal_matricula" class="form-control rounded-3 shadow-sm input-hover" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Nombre:</label>
                            <input type="text" id="animal_nombre" class="form-control rounded-3 shadow-sm input-hover" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Estado:</label>
                            <input type="text" id="animal_estado" class="form-control rounded-3 shadow-sm input-hover" readonly>
                        </div>
                    </div>
                </form>

                <ul class="nav nav-tabs mt-3" id="historialTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="historial-tab" data-bs-toggle="tab" data-bs-target="#historial" type="button" role="tab" aria-controls="historial" aria-selected="true">
                            Acciones Realizadas
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tratamientos-tab" data-bs-toggle="tab" data-bs-target="#tratamientos" type="button" role="tab" aria-controls="tratamientos" aria-selected="false">
                            Acciones Progamadas
                        </button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="historialTabsContent">

                    <div class="tab-pane fade show active" id="historial" role="tabpanel" aria-labelledby="historial-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Responsable</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-realizadas">
                                    <tr>
                                        <td>1</td>
                                        <td>2025-10-18</td>
                                        <td>Vacunación anual</td>
                                        <td>Desrcr</td>
                                        <td>Juan Pérez</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tratamientos" role="tabpanel" aria-labelledby="tratamientos-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Fecha Programada</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>
                                        <th>Notas</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-programadas">
                                @foreach($reportes as $index => $reporte)
                                <tr data-animal="{{ $reporte->animal_id }}">
                                    <td>{{ $reporte->fecha }}</td>
                                    <td>{{ $reporte->tipo }}</td>
                                    {{-- <td>Animal #{{ $reporte->animal_id }}</td> --}}
                                    <td>{{ $reporte->actividad }}</td>
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

            <div class="modal-footer border-top-0 justify-content-end p-3">
                <button type="button" class="btn btn-light text-secondary rounded-3" data-bs-dismiss="modal">Cerrar</button>
            </div>

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

.input-hover {
    transition: all 0.25s ease;
}
.input-hover:focus {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-color: #2D995B;
}
.nav-tabs .nav-link.active {
    background-color: #2D995B;
    color: white;
    font-weight: 600;
}
.nav-tabs .nav-link {
    color: #2D995B;
    font-weight: 500;
}
</style>




