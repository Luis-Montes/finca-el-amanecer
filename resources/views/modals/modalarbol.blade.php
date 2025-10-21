<div class="modal fade" id="modalAgregarArbol" tabindex="-1" aria-labelledby="modalAgregarArbolLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="modalAgregarArbolLabel" style="letter-spacing: 0.5px;">
                    Agregar Nuevo Árbol
                </h5>
            </div>

            <form id="form-arbol" action="{{ route('trees.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <input id="evento_store_arbol" type="hidden" name="evento_store" />
                        <input id="id_arbol" type="hidden" name="arbol_id" />
                        <div class="col-md-6">
                            <label for="matricula" class="form-label fw-semibold">Matrícula</label>
                            <input type="text" class="form-control" id="matricula_arbol" name="matricula" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control" id="nombre_arbol" name="nombre" required>
                        </div>
                    
                        <div class="col-md-6">
                            <label for="rol" class="form-label fw-semibold">Tipo *</label>
                            <select class="form-control" id="tipo_arbol" name="tipo" required>
                                <option value="">Seleccionar especie</option>
                                <option value="Arbol Frutal">Árbol Frutal</option>
                                <option value="Arbol Ornamental">Árbol Ornamental</option>
                                <option value="Parcela de Plantacion">Parcela de Plantacion</option>
                                <option value="Cultivo">Cultivo</option>
                                <option value="Hortaliza">Hortaliza</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="telefono" class="form-label fw-semibold">Especie</label>
                            <input type="text" class="form-control" id="especie_arbol" name="especie" required>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_plantacion" class="form-label fw-semibold">Fecha de pantación (opcional)</label>
                            <input type="date" class="form-control rounded-3 shadow-sm input-hover" id="fecha_plantacion" name="fecha_plantacion" value="{{date('Y-m-d')}}">
                        </div>

                        <div class="col-md-6">
                            <label for="rol" class="form-label fw-semibold">Estado</label>
                            <select class="form-control" id="estado_arbol" name="estado" required>
                                <option value="Saludable">Saludable</option>
                                <option value="Enfermo">Enfermo</option>
                                <option value="Talado">Talado</option>
                                <option value="Coseshado">Coseshado</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="observaciones" class="form-label fw-semibold">Observaciones</label>
                            <textarea class="form-control rounded-3 shadow-sm input-hover" id="observaciones_arbol" name="observaciones" rows="3"></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-top-0 justify-content-between p-3">
                    <button type="button" class="btn btn-light text-secondary rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <<button type="button" class="btn btn-success rounded-3 px-4" id="btnGuardarArbol">Guardar</button>

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
