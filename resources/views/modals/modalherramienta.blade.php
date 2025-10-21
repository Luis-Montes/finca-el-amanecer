<div class="modal fade" id="modalAgregarHerramienta" tabindex="-1" aria-labelledby="modalAgregarHerramientalabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="modalAgregarHerramientaLabel" style="letter-spacing: 0.5px;">
                    Agregar Nueva herramienta
                </h5>
            </div>
{{--  --}}
            <form id="form-herramienta" action="{{ route('tools.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <input id="evento_store_herramienta" type="hidden" name="evento_store" />
                        <input id="id_herramienta" type="hidden" name="herramienta_id" />
                        <div class="col-md-6">
                            <label for="matricula" class="form-label fw-semibold">Matrícula</label>
                            <input type="text" class="form-control" id="matricula_herramienta" name="matricula" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control" id="nombre_herramienta" name="nombre" required>
                        </div>
                    
                        <div class="col-md-6">
                            <label for="rol" class="form-label fw-semibold">Tipo *</label>
                            <select class="form-control" id="tipo_herramienta" name="tipo" required>
                                <option value="">Seleccionar especie</option>
                                <option value="Veiculo">Veiculo</option>
                                <option value="Maquina Motorizada Grande">Maquina Motorizada Grande</option>
                                <option value="Maquina Motorizada Mediana">Maquina Motorizada Mediana</option>
                                <option value="Maquina Motorizada Chica">Maquina Motorizada Chica</option>
                                <option value="Herramienta de Mano">Herramienta de Mano</option>
                                <option value="Herramienta de Dos Manos">Herramienta de Dos Manos</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="rol" class="form-label fw-semibold">Estado</label>
                            <select class="form-control" id="estado_herramienta" name="estado" required>
                                <option value="Operativa">Operativa</option>
                                <option value="En Reparacion">En Reparacion</option>
                                <option value="Extraviada">Extraviada</option>
                                <option value="Fuera de Servicio">Fuera de Servicio</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_plantacion" class="form-label fw-semibold">Fecha de Compra/Ingreso (opcional)</label>
                            <input type="date" class="form-control rounded-3 shadow-sm input-hover" id="fecha_compra" name="fecha_compra" value="{{date('Y-m-d')}}">
                        </div>

                        <div class="col-md-6">
                            <label for="responsable" class="form-label fw-semibold">Responsable Actual</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="responsable_herramienta" name="responsable" required>
                                <option value="">Seleccionar responsable</option>
                                @foreach($trabajadores as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="observaciones" class="form-label fw-semibold">Observaciones</label>
                            <textarea class="form-control rounded-3 shadow-sm input-hover" id="observaciones_herramienta" name="observaciones" rows="3"></textarea>
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
