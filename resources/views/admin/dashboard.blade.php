<x-app-layout>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <h2 class="text-success-subtle font-weight-bold bg-success text-center py-2">
                    {{ __('Bienvenido: ') }}{{ Auth::user()->name }}
                </h2>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-success mx-1 text-light" href="{{ route('admin.dashboard') }}">{{ __('Inicio') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success mx-1 text-light" href="{{ route('employee.index') }}">{{ __('Personal') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success mx-1 text-light" href="{{ route('service.index') }}">{{ __('Servicios') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success mx-1 text-light" href="{{ route('family.index') }}">{{ __('Infantes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success mx-1 text-light" href="{{ route('post.index') }}">{{ __('Avisos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success mx-1 text-light" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="bg-light rounded shadow-sm p-4 mb-5">
                    <h4>Bienvenido al Panel de Tablas!</h4>
                    @yield('content')
                </div>
            </div>

            <div class="col-sm-4">
                <div class="bg-light rounded shadow-sm p-4 mb-5">
                    <h1 class="text-3xl font-bold mb-4">¡Bienvenido al Panel de Administración!</h1>
                    <p class="text-lg mb-6">Aquí puedes gestionar todos los aspectos de nuestra aplicación con facilidad. A continuación, encontrarás una visión general de las secciones principales:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 rounded">
                        <div class="bg-white rounded-lg shadow-lg p-4 text-center">
                            <h2 class="text-xl font-semibold mb-2">Gestión del Personal</h2>
                            <p class="mb-4">Administra la información de los empleados y sus detalles. Agrega, edita o elimina registros según sea necesario.</p>
                            <a href="{{ route('employee.index') }}" class="btn btn-success">Ver Personal</a>
                        </div>
                        <br>
                        <div class="bg-white rounded-lg shadow-lg p-4 text-center">
                            <h2 class="text-xl font-semibold mb-2">Servicios</h2>
                            <p class="mb-4">Visualiza y administra los servicios ofrecidos. Asegúrate de mantener la información actualizada para nuestros usuarios.</p>
                            <a href="{{ route('service.index') }}" class="btn btn-success">Ver Servicios</a>
                        </div>
                        <br>
                        <div class="bg-white rounded-lg shadow-lg p-4 text-center">
                            <h2 class="text-xl font-semibold mb-2">Infantes</h2>
                            <p class="mb-4">Consulta y gestiona la información de los niños registrados. Asegúrate de que todos los datos estén completos y correctos.</p>
                            <a href="{{ route('family.index') }}" class="btn btn-success">Ver Infantes</a>
                        </div>
                        <br>
                        <div class="bg-white rounded-lg shadow-lg p-4 text-center">
                            <h2 class="text-xl font-semibold mb-2">Avisos</h2>
                            <p class="mb-4">Revisa y publica avisos importantes para el personal y los padres. Mantén a todos informados sobre las últimas novedades.</p>
                            <a href="{{ route('post.index') }}" class="btn btn-success">Ver Avisos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>