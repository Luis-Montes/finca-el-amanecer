<div class="modal fade" id="modalAgregarEmpleado" tabindex="-1" aria-labelledby="modalAgregarEmpleadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <!-- Header elegante -->
            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="modalAgregarEmpleadoLabel" style="letter-spacing: 0.5px;">
                    Agregar Nuevo Trabajador
                </h5>
            </div>

            <!-- Formulario con padding y transición -->
            <form id="form-empleado" action="" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Inputs -->
                        <div class="col-md-6">
                            <label for="matricula" class="form-label fw-semibold">Matrícula</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="matricula" name="matricula" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="nombre" name="nombre" required>
                        </div>

                        <div class="col-md-6">
                            <label for="especie" class="form-label fw-semibold">Apellidos</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="especie" name="especie" required>
                        </div>

                        <div class="col-md-6">
                            <label for="raza" class="form-label fw-semibold">Telefono</label>
                            <input type="phone" class="form-control rounded-3 shadow-sm input-hover" id="telefono" name="telefono" required>
                        </div>

                        <div class="col-md-6">
                            <label for="raza" class="form-label fw-semibold">Contraseña</label>
                            <input type="password" class="form-control rounded-3 shadow-sm input-hover" id="password" name="password" required>
                        </div>

                        <div class="col-md-6">
                            <label for="estado" class="form-label fw-semibold">Rol</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="rol" name="rol" required>
                                <option value="administrador">Administrador</option>
                                <option value="trabajador">Trabajador</option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Footer minimalista -->
                <div class="modal-footer border-top-0 justify-content-between p-3">
                    <button type="button" class="btn btn-light text-secondary rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success rounded-3 px-4">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Inputs con hover/focus suave */
.input-hover {
    transition: all 0.25s ease;
}
.input-hover:focus {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-color: #2D995B;
}

/* Animación del modal */
.modal.fade .modal-dialog {
    transform: translateY(-20px);
    transition: transform 0.3s ease-out, opacity 0.3s ease;
}
.modal.fade.in .modal-dialog {
    transform: translateY(0);
}

/* Ajustes de sombra y bordes */
.modal-content.shadow-lg {
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}
</style>
