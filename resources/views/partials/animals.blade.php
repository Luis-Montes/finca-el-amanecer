<div class="module" id="animals" style="display:none;">
    <h3>Animales</h3>
    @if(!$dbOnline)
        <div class="alert alert-danger text-center">
            🚨 No hay conexión con la base de datos. Intenta más tarde.
        </div>
    @endif

    <div class="row g-2 mb-3 align-items-center">
        <div class="col-md-8 d-flex gap-2">
            <select id="filter-especie" class="form-select w-auto">
                <option value="">Todas las especies</option>
                @foreach($especies as $especie)
                    <option value="{{ $especie }}">{{ $especie }}</option>
                @endforeach
            </select>

            <select id="filter-estado" class="form-select w-auto">
                <option value="">Todos los estados</option>
                @foreach($estados as $est)
                    <option value="{{ $est }}">{{ $est }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarAnimal">
            <i class="bi bi-plus-circle"></i> Agregar Animal
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="table-animales">
        <thead>
        <tr>
            <th>#</th>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Fecha de Nacimiento</th>
            <th>Estado</th>
            <th>Registro</th>
            <th>Historial</th>
        </tr>
        </thead>
        <tbody>
        @foreach($animales as $index => $animal)
        <tr data-especie="{{ $animal->especie }}" data-estado="{{ $animal->estado }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $animal->matricula }}</td>
            <td>{{ $animal->nombre }}</td>
            <td>{{ $animal->especie }}</td>
            <td>{{ $animal->raza }}</td>
            <td>{{ $animal->fecha_nacimiento }}</td>
            <td>{{ $animal->estado }}</td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="openRegistroModal({{ $animal->id }})">Registro</button>
            </td>
            <td>
                <button class="btn btn-sm btn-info" onclick="openHistorialModal({{ $animal->id }})">Historial</button>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
