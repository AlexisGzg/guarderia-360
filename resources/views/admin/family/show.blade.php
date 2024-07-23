@extends('admin.dashboard')

@section('template_title')
{{ __('Detalles de Tutor y Sus Hijos') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Detalles de Tutor y Sus Hijos') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('family.index') }}" class="btn btn-success btn-sm float-right">
                                {{ __('Regresar') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">{{ __('Información del Tutor') }}</h5>
                            <div class="alert bg-success-subtle text-dark">
                                <strong>Nombre:</strong>
                                {{ $tutor->name }}
                            </div>
                            <div class="alert bg-success-subtle text-dark">
                                <strong>Apellido Paterno:</strong>
                                {{ $tutor->middlename }}
                            </div>
                            <div class="alert bg-success-subtle text-dark">
                                <strong>Apellido Materno:</strong>
                                {{ $tutor->lastname }}
                            </div>
                            <div class="alert bg-success-subtle text-dark">
                                <strong>Teléfono:</strong>
                                {{ $tutor->phone }}
                            </div>
                            <div class="alert bg-success-subtle text-dark">
                                <strong>Foto:</strong>
                                <a href="{{ asset($tutor->photo) }}" target="_blank"><img src="{{ asset($tutor->photo) }}" width="200" height="200" alt="Foto"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">{{ __('Hijos') }}</h5>
                            @if ($tutor->children)
                                @foreach ($tutor->children as $child)
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Nombre:</strong>
                                        {{ $child->name }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Apellido Paterno:</strong>
                                        {{ $child->middlename }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Apellido Materno:</strong>
                                        {{ $child->lastname }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Fecha de Nacimiento:</strong>
                                        {{ $child->birthdate }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Fotografía:</strong>
                                        <a href="{{ asset($child->photo) }}" target="_blank"><img src="{{ asset($child->photo) }}" width="200" height="200" alt="Foto"></a>
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Género:</strong>
                                        {{ $child->gender }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Altura (cm):</strong>
                                        {{ $child->height }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Peso (kg):</strong>
                                        {{ $child->weight }}
                                    </div>
                                    <div class="alert bg-success-subtle text-dark">
                                        <strong>Descripción:</strong>
                                        {{ $child->description }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection