@extends('admin.dashboard')

@section('template_title')
    Infantes y Tutores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Infantes y Tutores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('family.create') }}" class="btn btn-success btn-sm float-right" data-placement="left">
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
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Teléfono</th>
                                        <th>Foto</th>
                                        <th>Infantes</th>
                                        <th>Acciones</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutors as $tutor)
                                        <tr>
                                            <td>{{ $tutor->id }}</td>
                                            <td>{{ $tutor->name }}</td>
                                            <td>{{ $tutor->middlename }}</td>
                                            <td>{{ $tutor->lastname }}</td>
                                            <td>{{ $tutor->phone }}</td>
                                            <td><img src="{{ asset($tutor->photo) }}" width="100" height="100" alt="Foto"></td>
                                            <td>
                                                @if ($tutor->children)
                                                    @foreach ($tutor->children as $child)
                                                        <p>{{ $child->name}} {{ $child->middlename }} {{ $child->lastname }}</p>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('family.destroy', $tutor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('family.show', $tutor->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('family.edit', $tutor->id) }}"><i class="bi bi-pen"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estás seguro de borrar?')"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tutors->links() !!}
            </div>
        </div>
    </div>
@endsection
