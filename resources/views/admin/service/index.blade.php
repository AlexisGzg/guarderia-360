@extends('admin.dashboard')

@section('template_title')
    Services
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('service.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
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

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
									<th >Nombre</th>
                                    <th >Descripción</th>
									<th >Precio</th>
									<th >Estado</th>
									<th >Foto</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            
										<td >{{ $service->name }}</td>
										<td >{{ $service->description }}</td>
										<td >${{ $service->price }}</td>
										<td >{{ $service->status }}</td>
                                            <td >
                                                <a href="{{ asset($service->photo) }}" target="_blank">
                                                    <img src="{{ asset($service->photo) }}" width="100" height="auto" alt="arte">
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('service.show', $service->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('service.edit', $service->id) }}"><i class="bi bi-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $services->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
