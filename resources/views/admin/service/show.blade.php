@extends('admin.dashboard')

@section('template_title')
    {{ $service->name ?? __('Show') . " " . __('Service') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('service.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="alert bg-success-subtle text-dark">
                                    <strong>Name:</strong>
                                    {{ $service->name }}
                                </div>
                                <div class="alert bg-success-subtle text-dark">
                                    <strong>Description:</strong>
                                    {{ $service->description }}
                                </div>
                                <div class="alert bg-success-subtle text-dark">
                                    <strong>Price:</strong>
                                    {{ $service->price }}
                                </div>
                                <div class="alert bg-success-subtle text-dark">
                                    <strong>Status:</strong>
                                    {{ $service->status }}
                                </div>
                                <div class="alert bg-success-subtle text-dark">
                                    <strong>Photo:</strong>
                                    <a href="{{ asset($service->photo) }}" target="_blank">
                                        <img src="{{ asset($service->photo) }}" alt="Imagen de servicio" width="300" height="auto" class="img-fluid">
                                    </a>
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
