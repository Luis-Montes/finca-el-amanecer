async function reloadTool() {
    try {
        const res = await fetch('/tools/partial');
        if (!res.ok) throw new Error('Error al cargar los animales');

        const html = await res.text();
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        const newTbody = tempDiv.querySelector('#table-herramientas tbody');
        const currentTbody = document.querySelector('#table-herramientas tbody');

        if (currentTbody && newTbody) {
            currentTbody.replaceWith(newTbody);
        }
    } catch (err) {
        console.error(err);
    }
}



function openHerramientaModal(eventoStore, herramientaId = '', matricula = '', nombre = '', tipo = '', fecha_compra = '', estado = '', observaciones = '', responsable = '',){
    const modal = new bootstrap.Modal(document.getElementById('modalAgregarHerramienta'));
    modal.show();
    
    document.getElementById('evento_store_herramienta').value = eventoStore;

    document.getElementById('id_herramienta').value = herramientaId;

    if (matricula != '')
    {
        document.getElementById('matricula_herramienta').value = matricula;
    }
    else
        generarMatriculaHerramienta()

    document.getElementById('nombre_herramienta').value = nombre;

    if (tipo != '')
    {
        document.getElementById('tipo_herramienta').value = tipo;
        for(var i = 0; i < document.getElementById('tipo_herramienta').options.length; i++ )
        {
            if (document.getElementById('tipo_herramienta').options[i] == tipo)
            {
                document.getElementById('tipo_herramienta').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('tipo_herramienta').selectedIndex = 0;

    if (estado != '')
    {
        document.getElementById('estado_herramienta').value = estado;
        for(var i = 0; i < document.getElementById('estado_herramienta').options.length; i++ )
        {
            if (document.getElementById('estado_herramienta').options[i] == estado)
            {
                document.getElementById('estado_herramienta').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('estado_herramienta').selectedIndex = 0;

    document.getElementById('fecha_compra').value = fecha_compra;

    if (responsable != '')
    {
        document.getElementById('responsable_herramienta').value = responsable;
        for(var i = 0; i < document.getElementById('responsable_herramienta').options.length; i++ )
        {
            if (document.getElementById('responsable_herramienta').options[i] == responsable)
            {
                document.getElementById('responsable_herramienta').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('responsable_herramienta').selectedIndex = 0;

    document.getElementById('observaciones_herramienta').value = observaciones;    
    
    eventForm(modal);
}

function generarMatriculaHerramienta(){
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let matricula = '';
    for (let i = 0; i < 8; i++) {
        matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    const matriculaInput = document.getElementById('matricula_herramienta');
    if (matriculaInput) matriculaInput.value = matricula;
}

function eventForm(modal){
    const form = document.getElementById('form-herramienta');
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