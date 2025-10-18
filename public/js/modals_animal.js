document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-animal');
    const modal = document.getElementById('modalAgregarAnimal');
    const modalInstance = modal ? bootstrap.Modal.getOrCreateInstance(modal) : null;

    if (form) {
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
                modalInstance?.hide();
                form.reset();

            } catch (err) {
                console.error(err);
                alert('Error al guardar');
            }
        });
    }

    const modalEl = document.getElementById('modalAgregarAnimal');
    if (modalEl) {
        modalEl.addEventListener('show.bs.modal', () => {
            const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let matricula = '';
            for (let i = 0; i < 8; i++) {
                matricula += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
            }
            const matriculaInput = document.getElementById('matricula');
            if (matriculaInput) matriculaInput.value = matricula;
        });
    }
});

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
