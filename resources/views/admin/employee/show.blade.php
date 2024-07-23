@extends('admin.dashboard')

@section('template_title')
{{ $employee->name ?? __('Show') . " " . __('Employee') }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrando') }} Empleado No: {{ $employee->id }}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-success btn-sm" href="{{ route('employee.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="alert bg-success-subtle text-dark">
                        <strong>Nombre:</strong>
                        {{ $employee->name }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Apellido Paterno:</strong>
                        {{ $employee->middlename }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Apellido Materno:</strong>
                        {{ $employee->lastname }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Cargo:</strong>
                        {{ $employee->jobtitle }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Estatus:</strong>
                        {{ $employee->status }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Photo:</strong>
                        <a href="{{ asset($employee->photo) }}" target="_blank"><img src="{{ asset($employee->photo) }}" width="200" height="200" alt="Foto"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection