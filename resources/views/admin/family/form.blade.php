<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-body">
                    @csrf

                    {{-- Formulario para datos del tutor --}}
                    <h4>Tutor</h4>
                    <div class="form-group">
                        <label for="name">{{ __('Nombre') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="middlename">{{ __('Apellido Paterno') }}</label>
                        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}">
                        @error('middlename')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lastname">{{ __('Apellido Materno') }}</label>
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required>
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('Teléfono') }}</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo" class="form-label">{{ __('Foto') }}</label>
                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Formulario para datos del infante --}}
                    <hr>
                    <h4>Infante</h4>

                    <div class="form-group">
                        <label for="children_name">{{ __('Nombre') }}</label>
                        <input id="children_name" type="text" class="form-control @error('children_name') is-invalid @enderror" name="children_name" value="{{ old('children_name') }}" required>
                        @error('children_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="children_middlename">{{ __('Apellido Paterno') }}</label>
                        <input id="children_middlename" type="text" class="form-control @error('children_middlename') is-invalid @enderror" name="children_middlename" value="{{ old('children_middlename') }}">
                        @error('children_middlename')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="children_lastname">{{ __('Apellido Materno') }}</label>
                        <input id="children_lastname" type="text" class="form-control @error('children_lastname') is-invalid @enderror" name="children_lastname" value="{{ old('children_lastname') }}" required>
                        @error('children_lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="birthdate">{{ __('Fecha de Nacimiento') }}</label>
                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required>
                        @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="child_photo">{{ __('Foto del Infante') }}</label>
                        <input id="child_photo" type="file" class="form-control @error('child_photo') is-invalid @enderror" name="child_photo">
                        @error('child_photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">{{ __('Género') }}</label>
                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                            <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="height">{{ __('Altura (cm)') }}</label>
                        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required>
                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="weight">{{ __('Peso (kg)') }}</label>
                        <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required>
                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Descripción') }}</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success mt-2">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>