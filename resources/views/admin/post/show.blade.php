@extends('admin.dashboard')

@section('template_title')
{{ $post->name ?? __('Show') . " " . __('Post') }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrar') }} Post {{ $post->id }}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-success btn-sm" href="{{ route('post.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">

                    <div class="alert bg-success-subtle text-dark">
                        <strong>Title:</strong>
                        {{ $post->title }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Content:</strong>
                        {{ $post->content }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Creado el:</strong>
                        {{ $post->created_at }}
                    </div>
                    <div class="alert bg-success-subtle text-dark">
                        <strong>Actualizado el:</strong>
                        {{ $post->updated_at }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection