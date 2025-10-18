<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="modalRegistroLabel" style="letter-spacing: 0.5px;">
                    Registrar Acción
                </h5>
            </div>

            <form id="form-registro" action="{{ route('registro.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <input type="hidden" id="animal_id" name="animal_id">

                        <div class="col-md-6">
                            <label for="accion" class="form-label fw-semibold">Tipo de Acción *</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="tipo" name="tipo" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="Vacuna">Vacuna</option>
                                <option value="Medicamento">Medicamento</option>
                                <option value="Revision Veterinaria">Revisión Veterinaria</option>
                                <option value="Alimentacion Especial">Alimentación Especial</option>
                                <option value="Reproduccion">Reproducción</option>
                                <option value="Observacion">Observación</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre de la Acción *</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="actividad" name="actividad" required>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha" class="form-label fw-semibold">Fecha *</label>
                            <input type="date" class="form-control rounded-3 shadow-sm input-hover" id="fecha" name="fecha" required>
                        </div>

                        <div class="col-md-6">
                            <label for="hora" class="form-label fw-semibold">Hora *</label>
                            <input type="time" class="form-control rounded-3 shadow-sm input-hover" id="hora" name="hora" required>
                        </div>

                        <div class="col-12">
                            <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                            <textarea class="form-control rounded-3 shadow-sm input-hover" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="responsable" class="form-label fw-semibold">Responsable *</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="responsable" name="responsable" required>
                                <option value="">Seleccionar responsable</option>
                                @foreach($trabajadores as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                        <input type="hidden" name="estado" value="Completada">
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="estado" name="estado" value="Programada">
                            <label class="form-check-label fw-semibold" for="estado">
                                Agendar próxima acción
                            </label>
                        </div>

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

