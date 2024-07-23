@extends('admin.dashboard')

@section('template_title')
    {{ __('Create') }} Employee
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar') }} Empleado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employee.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.employee.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
