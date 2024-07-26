<nav class="navbar navbar-expand-lg navbar-light bg-success p-1">
    <div class="container-fluid">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" width="75" height="75" alt="logo">

        <!-- Brand -->
        <a class="navbar-brand text-dark" href="#">Guardería Joseph Lancaster</a>

        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Links -->
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-light mx-2" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-light mx-2" href="/indexService">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-light mx-2" href="/indexProgram">Nuestro programa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-light mx-2" href="/preRegister">Pre-registro</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->usertype == 'admin')
                                <a href="{{ url('admin/dashboard') }}" class="nav-link btn btn-success text-light mx-2">
                                    Perfil Administrador
                                </a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="nav-link btn btn-success text-light mx-2">
                                    Perfil
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="nav-link btn btn-success text-light mx-2">
                                Iniciar Sesión
                            </a>
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
