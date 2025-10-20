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

function openArbolModal(eventoStore, arbolId = '', matricula = '', nombre = '', especie = '', tipo = '', fecha_plantacion = '',  estado = '', observaciones = ''){
    const modal = new bootstrap.Modal(document.getElementById('modalAgregarArbol'));
    modal.show();
    
    document.getElementById('evento_store_arbol').value = eventoStore;

    document.getElementById('id_arbol').value = arbolId;
    if (matricula != '')
    {
        document.getElementById('matricula_arbol').value = matricula;
    }
    else
        generarMatriculaArbol()
    document.getElementById('nombre_arbol').value = nombre;
    if (tipo != '')
    {
        document.getElementById('tipo_arbol').value = tipo;
        for(var i = 0; i < document.getElementById('tipo_arbol').options.length; i++ )
        {
            if (document.getElementById('tipo_arbol').options[i] == tipo)
            {
                document.getElementById('tipo_arbol').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('tipo_arbol').selectedIndex = 0;
    if (especie != '')
    {
        document.getElementById('especie_arbol').value = especie;
        for(var i = 0; i < document.getElementById('especie_arbol').options.length; i++ )
        {
            if (document.getElementById('especie_arbol').options[i] == especie)
            {
                document.getElementById('especie_arbol').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('especie_arbol').selectedIndex = 0;
    document.getElementById('tipo_arbol').value = tipo;
    document.getElementById('fecha_plantacion').value = fecha_plantacion;
    document.getElementById('estado_arbol').value = estado;
    document.getElementById('observaciones_arbol').value = observaciones;    
    
    eventForm(modal);
}

function generarMatriculaArbol(){
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let matricula = '';
    for (let i = 0; i < 8; i++) {
        matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    const matriculaInput = document.getElementById('matricula_arbol');
    if (matriculaInput) matriculaInput.value = matricula;
}

function eventForm(modal){
    const form = document.getElementById('form-arbol');
    form.addEventListener('submit', async (e) => {
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

                await reloadTree();
                modal.hide();
                form.reset();

            } catch (err) {
                console.error(err);
                alert('Error al guardar');
            }
        });
}