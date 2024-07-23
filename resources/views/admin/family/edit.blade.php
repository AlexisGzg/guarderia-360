@extends('admin.dashboard')

@section('template_title')
    {{ __('Actualizar Tutor y Sus Hijos') }}
        @endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('family.update', $tutor->id) }}" role="form" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <!-- Campos del Tutor -->
                            <div class="form-group">
                                <label for="name">{{ __('Nombre') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $tutor->name }}">
                            </div>
                            <div class="form-group">
                                <label for="middlename">{{ __('Apellido Paterno') }}</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $tutor->middlename }}">
                            </div>
                            <div class="form-group">
                                <label for="lastname">{{ __('Apellido Materno') }}</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $tutor->lastname }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{ __('Teléfono') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $tutor->phone }}">
                            </div>
                            <div class="form-group my-5">
                                <label for="photo">{{ __('Foto') }}</label>
                                @if ($tutor->photo)
                                    <img src="{{ asset($tutor->photo) }}" width="100" height="100" alt="Foto del Tutor">
                                @else
                                    <p>No hay foto disponible.</p>
                                @endif
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>

                            <!-- Campos de los Hijos -->
                            <h4>{{ __('Hijos') }}</h4>
                            @if ($tutor->children)
                                @foreach ($tutor->children as $child) 
                                    <div class="child-fields">
                                        <div class="form-group">
                                            <label for="child_name">{{ __('Nombre del Hijo') }}</label>
                                            <input type="text" class="form-control" id="child_name" name="child_name[]" value="{{ $child->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="child_middlename">{{ __('Apellido Paterno del Hijo') }}</label>
                                            <input type="text" class="form-control" id="child_middlename" name="child_middlename[]" value="{{ $child->middlename }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="child_lastname">{{ __('Apellido Materno del Hijo') }}</label>
                                            <input type="text" class="form-control" id="child_lastname" name="child_lastname[]" value="{{ $child->lastname }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="child_birthdate">{{ __('Fecha de Nacimiento') }}</label>                                        
                                            <input type="date" class="form-control" id="child_birthdate" name="child_birthdate" value="{{ $child->birthdate }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="child_gender">{{ __('Género') }}</label>
                                            <select class="form-control" id="child_gender" name="child_gender">
                                                <option value="male" {{ $child->gender === 'male' ? 'selected' : '' }}>Masculino</option>
                                                <option value="female" {{ $child->gender === 'female' ? 'selected' : '' }}>Femenino</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="child_height">{{ __('Altura (cm)') }}</label>
                                            <input type="number" class="form-control" id="child_height" name="child_height" value="{{ $child->height }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="child_weight">{{ __('Peso (kg)') }}</label>
                                            <input type="number" class="form-control" id="child_weight" name="child_weight" value="{{ $child->weight }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="child_description">{{ __('Descripción') }}</label>
                                            <textarea class="form-control" id="child_description" name="child_description">{{ $child->description }}</textarea>
                                        </div>
                                    </div> 
                                @endforeach
                            @endif

                            <hr>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ __('Actualizar') }}</button>
                                <a href="{{ route('family.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection