<div class="container">
    <h1>{{ isset($tutor->id) ? 'Editar Tutor' : 'Crear Tutor' }}</h1>

    <form action="{{ isset($tutor->id) ? route('family.update', $tutor->id) : route('family.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($tutor->id))
        @method('PUT')
        @endif

        <!-- Campos del tutor -->
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $tutor->name) }}" required>
        </div>

        <div class="form-group">
            <label for="middlename">Apellido Paterno:</label>
            <input type="text" name="middlename" class="form-control" value="{{ old('middlename', $tutor->middlename) }}">
        </div>

        <div class="form-group">
            <label for="lastname">Apellido Materno:</label>
            <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $tutor->lastname) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $tutor->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Foto:</label>
            <input type="file" name="photo" class="form-control">
            @if(isset($tutor->photo))
            <img src="{{ $tutor->photo }}" alt="Foto del tutor" width="100">
            @endif
        </div>

        <!-- Campos para los hijos -->
        <h3>Infantes</h3>

        <div id="children-container">
            @foreach($children as $index => $child)
            <div class="child-form" data-index="{{ $index }}">
                <h4>Infante {{ $index + 1 }}</h4>
                <input type="hidden" name="children[{{ $index }}][id]" value="{{ $child->id }}">
                <div class="form-group">
                    <label for="children[{{ $index }}][name]">Nombre:</label>
                    <input type="text" name="children[{{ $index }}][name]" class="form-control" value="{{ old('children.'.$index.'.name', $child->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][middlename]">Apellido Paterno:</label>
                    <input type="text" name="children[{{ $index }}][middlename]" class="form-control" value="{{ old('children.'.$index.'.middlename', $child->middlename) }}">
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][lastname]">Apellido Materno:</label>
                    <input type="text" name="children[{{ $index }}][lastname]" class="form-control" value="{{ old('children.'.$index.'.lastname', $child->lastname) }}" required>
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][birthdate]">Fecha de Nacimiento:</label>
                    <input type="date" name="children[{{ $index }}][birthdate]" class="form-control" value="{{ old('children.'.$index.'.birthdate', $child->birthdate) }}" required>
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][photo]">Foto:</label>
                    <input type="file" name="children[{{ $index }}][photo]" class="form-control">
                    @if(isset($child->photo))
                    <img src="{{ $child->photo }}" alt="Foto del infante" width="100">
                    @endif
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][gender]">Género:</label>
                    <input type="text" name="children[{{ $index }}][gender]" class="form-control" value="{{ old('children.'.$index.'.gender', $child->gender) }}" required>
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][height]">Altura:</label>
                    <input type="number" name="children[{{ $index }}][height]" class="form-control" value="{{ old('children.'.$index.'.height', $child->height) }}" required>
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][weight]">Peso:</label>
                    <input type="number" name="children[{{ $index }}][weight]" class="form-control" value="{{ old('children.'.$index.'.weight', $child->weight) }}" required>
                </div>

                <div class="form-group">
                    <label for="children[{{ $index }}][description]">Descripción:</label>
                    <textarea name="children[{{ $index }}][description]" class="form-control">{{ old('children.'.$index.'.description', $child->description) }}</textarea>
                </div>

                <button type="button" class="btn btn-danger mt-2 remove-child">Eliminar Infante</button>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-success mt-2" id="add-child">Añadir Infante</button>
        <button type="submit" class="btn btn-primary mt-2">{{ isset($tutor->id) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let childIndex = {{ count($children) }};
        const childrenContainer = document.getElementById('children-container');
        const addChildButton = document.getElementById('add-child');

        addChildButton.addEventListener('click', function () {
            const childForm = document.createElement('div');
            childForm.classList.add('child-form');
            childForm.dataset.index = childIndex;

            childForm.innerHTML = `
                <h4>Infante ${childIndex + 1}</h4>
                <div class="form-group">
                    <label for="children[${childIndex}][name]">Nombre:</label>
                    <input type="text" name="children[${childIndex}][name]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][middlename]">Segundo Nombre:</label>
                    <input type="text" name="children[${childIndex}][middlename]" class="form-control">
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][lastname]">Apellido:</label>
                    <input type="text" name="children[${childIndex}][lastname]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][birthdate]">Fecha de Nacimiento:</label>
                    <input type="date" name="children[${childIndex}][birthdate]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][photo]">Foto:</label>
                    <input type="file" name="children[${childIndex}][photo]" class="form-control">
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][gender]">Género:</label>
                    <input type="text" name="children[${childIndex}][gender]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][height]">Altura:</label>
                    <input type="number" name="children[${childIndex}][height]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][weight]">Peso:</label>
                    <input type="number" name="children[${childIndex}][weight]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="children[${childIndex}][description]">Descripción:</label>
                    <textarea name="children[${childIndex}][description]" class="form-control"></textarea>
                </div>

                <button type="button" class="btn btn-danger remove-child">Eliminar Infante</button>
            `;

            childrenContainer.appendChild(childForm);
            childIndex++;
        });

        childrenContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-child')) {
                event.target.closest('.child-form').remove();
            }
        });
    });
</script>
