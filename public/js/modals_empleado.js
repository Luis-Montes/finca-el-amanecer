async function reloadEmployees() {
    const res = await fetch('/employees/partial');
    if (res.ok) {
        const html = await res.text();
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        const newTbody = tempDiv.querySelector('#table-empleados tbody');
        const currentTbody = document.querySelector('#table-empleados tbody');

        if (currentTbody && newTbody) {
            currentTbody.replaceWith(newTbody);
        }
    }
}

function modalAgregarEmpleado(eventoStore, empleadoId = '', matricula = '', nombre = '', apellidos = '',  telefono = '', password = '', rol = ''){
    const modal = new bootstrap.Modal(document.getElementById('modalAgregarEmpleado'));
    modal.show();
    
    document.getElementById('evento_store_empleado').value = eventoStore;

    document.getElementById('id_empleado').value = empleadoId;

    if (matricula != '')
    {
        document.getElementById('matricula_empleado').value = matricula;
    }
    else
        generarMatriculaEmpleado()

    document.getElementById('nombre_empleado').value = nombre;

    document.getElementById('apellidos_empleado').value = apellidos;

    document.getElementById('telefono_empleado').value = telefono;

    document.getElementById('password_empleado').value = password;

    if (tipo != '')
    {
        document.getElementById('rol_empleado').value = rol;
        for(var i = 0; i < document.getElementById('rol_empleado').options.length; i++ )
        {
            if (document.getElementById('rol_empleado').options[i] == rol)
            {
                document.getElementById('rol_empleado').selectedIndex = i;
                return;
            }
        }
    }
    else
        document.getElementById('rol_empleado').selectedIndex = 0; 
    
    eventForm(modal);
}

function generarMatriculaEmpleado(){
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let matricula = '';
    for (let i = 0; i < 8; i++) {
        matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    const matriculaInput = document.getElementById('matricula_empleado');
    if (matriculaInput) matriculaInput.value = matricula;
}

function eventForm(modal){
    const form = document.getElementById('form-empleado');
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