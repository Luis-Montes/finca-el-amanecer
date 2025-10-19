<div class="modal fade" id="modalAgregarAnimal" tabindex="-1" aria-labelledby="modalAgregarAnimalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none; transition: transform 0.3s ease, opacity 0.3s ease;">

            <div class="modal-header" style="background-color: #2D995B; border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="modal-title text-white fw-bold" id="modalAgregarAnimalLabel" style="letter-spacing: 0.5px;">
                    Agregar Nuevo Animal
                </h5>
            </div>

            <form id="form-animal" action="{{route('animals.store')}}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="matricula" class="form-label fw-semibold">Matrícula</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="matricula" name="matricula" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre (opcional)</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="nombre" name="nombre">
                        </div>

                        <div class="col-md-6">
                            <label for="especie" class="form-label fw-semibold">Especie</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="especie" name="especie" required>
                                <option value="">Seleccionar especie</option>
                                <option value="Vaca">Vaca</option>
                                <option value="Cerdo">Cerdo</option>
                                <option value="Gallina">Gallina</option>
                                <option value="Cabra">Cabra</option>
                                <option value="Oveja">Oveja</option>
                                <option value="Caballo">Caballo</option>
                                <option value="Pato">Pato</option>
                                <option value="Conejo">Conejo</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="raza" class="form-label fw-semibold">Raza</label>
                            <input type="text" class="form-control rounded-3 shadow-sm input-hover" id="raza" name="raza" required>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_nacimiento" class="form-label fw-semibold">Fecha de Nacimiento (opcional)</label>
                            <input type="date" class="form-control rounded-3 shadow-sm input-hover" id="fecha_nacimiento" name="fecha_nacimiento" value="{{date('Y-m-d')}}">
                        </div>

                        <div class="col-md-6">
                            <label for="sexo" class="form-label fw-semibold">Sexo</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="sexo" name="sexo" required>
                                <option value="">Seleccionar</option>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="estado" class="form-label fw-semibold">Estado</label>
                            <select class="form-control rounded-3 shadow-sm input-hover" id="estado" name="estado" required>
                                <option value="">Seleccionar</option>
                                <option value="Activo">Activo</option>
                                <option value="Vendido">Vendido</option>
                                <option value="Fallecido">Fallecido</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="observaciones" class="form-label fw-semibold">Observaciones</label>
                            <textarea class="form-control rounded-3 shadow-sm input-hover" id="observaciones" name="observaciones" rows="3"></textarea>
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

