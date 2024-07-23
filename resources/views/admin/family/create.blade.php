@extends('admin.dashboard')

@section('template_title')
    {{ __('Create') }} Child
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar') }} Infante</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('family.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.family.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
