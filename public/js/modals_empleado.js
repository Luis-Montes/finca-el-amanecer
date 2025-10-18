document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-empleado');
    const modal = document.getElementById('modalAgregarEmpleado');
    const modalInstance = modal ? bootstrap.Modal.getOrCreateInstance(modal) : null;

    if (modal) {
        modal.addEventListener('show.bs.modal', () => {
            const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let matricula = '';
            for (let i = 0; i < 8; i++) {
                matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
            }
            document.getElementById('matricula_empleado').value = matricula;
        });
    }

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

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

                if (!response.ok) throw new Error('Error al guardar el trabajador');

                const data = await response.json();
                if (data.success && data.user) {
                    const tbody = document.querySelector('#table-empleados tbody');
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${tbody.children.length + 1}</td>
                        <td>${data.user.username}</td>
                        <td>${data.user.name}</td>
                        <td>${data.user.apellidos || ''}</td>
                        <td>${data.user.role}</td>
                    `;
                    tbody.appendChild(row);
                }

                modalInstance?.hide();
                form.reset();

            } catch (err) {
                console.error(err);
                alert('Error al guardar');
            }
        });
    }
});
