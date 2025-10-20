function openModalHistorial(animalId = '', matricula = '', nombre = '', estado = '') {
    document.getElementById('animal_id_historial').value = animalId;
    document.getElementById('animal_id_display').value = animalId;
    document.getElementById('animal_matricula').value = matricula;
    document.getElementById('animal_nombre').value = nombre;
    document.getElementById('animal_estado').value = estado;

    const modal = new bootstrap.Modal(document.getElementById('modalHistorial'));
    modal.show();

    const filas = document.querySelectorAll('#tabla-programadas tr');
    filas.forEach(fila => {
        const filaAnimal = fila.getAttribute('data-animal');
        if (filaAnimal == animalId) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }
    });

    const filasRealizadas = document.querySelectorAll('#tabla-realizadas tr');
    filasRealizadas.forEach(fila => {
        const filaAnimal = fila.getAttribute('data-animal');
        if (filaAnimal && filaAnimal != animalId) {
            fila.style.display = 'none';
        } else {
            fila.style.display = '';
        }
    });
}
