async function reloadAnimals() {
    try {
        const res = await fetch('/animals/partial');
        if (!res.ok) throw new Error('Error al cargar los animales');

        const html = await res.text();
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        const newTbody = tempDiv.querySelector('#table-animales tbody');
        const currentTbody = document.querySelector('#table-animales tbody');

        if (currentTbody && newTbody) {
            currentTbody.replaceWith(newTbody);
        }
    } catch (err) {
        console.error(err);
    }
}

function openAnimalModal(eventoStore, animalId = '', matricula = '', nombre = '', especie = '', raza = '', fecha_nacimiento = '', sexo = '', estado = '', observaciones = '') {
    const modalEl = document.getElementById('modalAgregarAnimal');
    const modal = new bootstrap.Modal(modalEl);
    modal.show();

    document.getElementById('evento_store_animal').value = eventoStore;
    document.getElementById('id_animal').value = animalId;
    document.getElementById('matricula_animal').value = matricula || generarMatriculaAnimal();
    document.getElementById('nombre_animal').value = nombre;

    // Selección de especie
    const especieSelect = document.getElementById('especie_animal');
    especieSelect.value = especie || especieSelect.options[0].value;

    // Raza, fecha y estado
    document.getElementById('raza_animal').value = raza;
    document.getElementById('fecha_nacimiento_animal').value = fecha_nacimiento;
    document.getElementById('estado_animal').value = estado;
    document.getElementById('observaciones_animal').value = observaciones;

    // Selección de sexo
    const sexoSelect = document.getElementById('sexo_animal');
    sexoSelect.value = sexo || sexoSelect.options[0].value;

    bindFormSubmit(modal);
}

function generarMatriculaAnimal() {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let matricula = '';
    for (let i = 0; i < 8; i++) {
        matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    document.getElementById('matricula_animal').value = matricula;
    return matricula;
}

function bindFormSubmit(modal) {
    const form = document.getElementById('form-animal');

    // Evita múltiples listeners
    form.removeEventListener('submit', submitHandler);
    form.addEventListener('submit', submitHandler);

    async function submitHandler(e) {
        e.preventDefault();
        e.stopPropagation();

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                }
            });

            if (!response.ok) throw new Error('Error en la solicitud');

            await reloadAnimals(); // Solo actualiza la tabla
            modal.hide();
            form.reset();

            // Mostrar notificación
            const toastEl = document.getElementById('saveToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();

        } catch (err) {
            console.error(err);
            alert('Error al guardar');
        }
    }
}
