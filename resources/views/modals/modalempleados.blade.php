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
            <form id="form-empleado" action="{{ route('empleado.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Inputs -->
                        <div class="col-md-6">
                            <label for="matricula" class="form-label fw-semibold">Matrícula</label>
                            <input type="text" class="form-control" id="matricula_empleado" name="matricula" readonly>


                        </div>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>

                        <div class="col-md-6">
                            <label for="telefono" class="form-label fw-semibold">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="col-md-6">
                            <label for="rol" class="form-label fw-semibold">Rol</label>
                            <select class="form-control" id="rol" name="rol" required>
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


{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modalAgregarEmpleado');
    const input = document.getElementById('matricula_empleado');

    if (!modal) return console.error('No se encontró el modal');
    if (!input) return console.error('No se encontró el input de matrícula');

    modal.addEventListener('show.bs.modal', function() {
        const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let matricula = '';
        for (let i = 0; i < 8; i++) {
            matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
        }
        input.value = matricula;
        console.log('Matrícula generada:', matricula);
    });
});
</script> --}}
