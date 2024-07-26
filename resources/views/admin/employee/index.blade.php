@extends('admin.dashboard')

@section('template_title')
    Employees
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Personal') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('employee.create') }}" class="btn btn-success btn-sm float-right" data-placement="left">
                                  {{ __('Agregar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre (s)</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Cargo</th>
                                        <th>Estatus</th>
                                        <th>Foto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->middlename }}</td>
                                            <td>{{ $employee->lastname }}</td>
                                            <td>{{ $employee->jobtitle }}</td>
                                            <td>{{ $employee->status }}</td>
                                            <td><img src="{{ asset('storage/photos/' . basename($employee->photo)) }}" width="100" height="100" alt="Foto" class="img-fluid"></td>
                                            <td>
                                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('employee.show', $employee->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('employee.edit', $employee->id) }}"><i class="bi bi-pen"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('Estás seguro de borrar?')) this.closest('form').submit();"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No hay personal registrados</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $employees->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
