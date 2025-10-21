// Función para recargar solo la tabla
async function reloadTree() {
    const res = await fetch('/trees/partial');
    if (res.ok) {
        const html = await res.text();
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        const newTbody = tempDiv.querySelector('#table-arboles tbody');
        const currentTbody = document.querySelector('#table-arboles tbody');

        if (currentTbody && newTbody) {
            currentTbody.replaceWith(newTbody);
        }
    }
}

// Abrir modal y llenar campos
function openArbolModal(eventoStore, arbolId = '', matricula = '', nombre = '', especie = '', tipo = '', fecha_plantacion = '', estado = '', observaciones = '') {
    const modalElement = document.getElementById('modalAgregarArbol');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();

    document.getElementById('evento_store_arbol').value = eventoStore;
    document.getElementById('id_arbol').value = arbolId;
    document.getElementById('matricula_arbol').value = matricula || generarMatriculaArbol();
    document.getElementById('nombre_arbol').value = nombre;
    document.getElementById('tipo_arbol').value = tipo || '';
    document.getElementById('especie_arbol').value = especie || '';
    document.getElementById('fecha_plantacion').value = fecha_plantacion || '';
    document.getElementById('estado_arbol').value = estado || 'Saludable';
    document.getElementById('observaciones_arbol').value = observaciones || '';

    // Adjuntar listener solo una vez
    if (!modalElement.dataset.listenerAttached) {
        eventForm(modal);
        modalElement.dataset.listenerAttached = "true";
    }
}

// Genera matrícula aleatoria
function generarMatriculaArbol() {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let matricula = '';
    for (let i = 0; i < 8; i++) {
        matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    document.getElementById('matricula_arbol').value = matricula;
    return matricula;
}

// Listener del formulario para envío vía AJAX
function eventForm(modal) {
    const form = document.getElementById('form-arbol');

    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Evita recarga
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

            await reloadTree(); // Recarga solo la tabla
            modal.hide();
            form.reset();

        } catch (err) {
            console.error(err);
            alert('Error al guardar el árbol');
        }
    });
}
