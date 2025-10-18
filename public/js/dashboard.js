function showModule(id) {
    document.querySelectorAll('.module').forEach(function(module) {
        module.style.display = 'none';
    });
    document.getElementById(id).style.display = 'block';
}

showModule('dashboard');


function filterAnimals() {
    const especie = document.getElementById('filter-especie').value.toLowerCase();
    const estado = document.getElementById('filter-estado').value.toLowerCase();

    const rows = document.querySelectorAll('#table-animales tbody tr');
    rows.forEach(row => {
        const rowEspecie = row.dataset.especie.toLowerCase();
        const rowEstado = row.dataset.estado.toLowerCase();

        if ((especie === '' || rowEspecie === especie) &&
            (estado === '' || rowEstado === estado)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

document.getElementById('filter-especie').addEventListener('change', filterAnimals);
document.getElementById('filter-estado').addEventListener('change', filterAnimals);
