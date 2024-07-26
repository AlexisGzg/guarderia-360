@extends('admin.dashboard')

@section('template_title')
    Posts
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Avisos') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('post.create') }}" class="btn btn-success btn-sm float-right" data-placement="left">
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
                                    <th>Titulo</th>
                                    <th>Contenido</th>
                                    <th>Publicado el</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <div class="content-preview">
                                            {{ Str::limit($post->content, 50) }}
                                        </div>
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('post.show', $post->id) }}"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-sm btn-warning" href="{{ route('post.edit', $post->id) }}"><i class="bi bi-pen"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay avisos registrados</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $posts->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
