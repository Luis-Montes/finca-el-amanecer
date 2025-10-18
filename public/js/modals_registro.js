function openRegistroModal(animalId) {
    document.getElementById('animal_id').value = animalId;

    var myModal = new bootstrap.Modal(document.getElementById('modalRegistro'));
    myModal.show();
}



