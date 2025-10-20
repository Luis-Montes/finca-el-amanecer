async function reloadAnimals() {
    const res = await fetch('/animals/partial');
    if (res.ok) {
        const html = await res.text();
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        const newTbody = tempDiv.querySelector('#table-animales tbody');
        const currentTbody = document.querySelector('#table-animales tbody');

        if (currentTbody && newTbody) {
            currentTbody.replaceWith(newTbody);
        }
    }
}

function openAnimalModal(eventoStore, animalId = '', matricula = '', nombre = '', especie = '', raza = '', fecha_nacimiento = '', sexo = '', estado = '', observaciones = ''){
    const modal = new bootstrap.Modal(document.getElementById('modalAgregarAnimal'));
    modal.show();
    
    document.getElementById('evento_store_animal').value = eventoStore;

    document.getElementById('id_animal').value = animalId;
    if (matricula != '')
    {
        document.getElementById('matricula_animal').value = matricula;
    }
    else
        generarMatriculaAnimal()
    document.getElementById('nombre_animal').value = nombre;
    if (especie != '')
    {
        document.getElementById('especie_animal').value = especie;
        for(var i = 0; i < document.getElementById('especie_animal').options.length; i++ )
        {
            if (document.getElementById('especie_animal').options[i] == especie)
            {
                document.getElementById('especie_animal').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('especie_animal').selectedIndex = 0;
    document.getElementById('raza_animal').value = raza;
    document.getElementById('fecha_nacimiento_animal').value = fecha_nacimiento;
    if (sexo != '')
    {
        document.getElementById('sexo_animal').value = sexo;
        for(var i = 0; i < document.getElementById('sexo_animal').options.length; i++ )
        {
            if (document.getElementById('sexo_animal').options[i] == sexo)
            {
                document.getElementById('sexo_animal').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('sexo_animal').selectedIndex = 0;
    document.getElementById('estado_animal').value = estado;
    document.getElementById('observaciones_animal').value = observaciones;    
    
    eventForm(modal);
}

function generarMatriculaAnimal(){
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let matricula = '';
    for (let i = 0; i < 8; i++) {
        matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    const matriculaInput = document.getElementById('matricula_animal');
    if (matriculaInput) matriculaInput.value = matricula;
}

function eventForm(modal){
    const form = document.getElementById('form-animal');
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

                await reloadAnimals();
                modal.hide();
                form.reset();

            } catch (err) {
                console.error(err);
                alert('Error al guardar');
            }
        });
}