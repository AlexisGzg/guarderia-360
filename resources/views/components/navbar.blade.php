<nav class="navbar navbar-expand-lg bg-success p-2" data-bs-theme="dark">
    <div class="container-fluid">
        <img src="{{ asset('images/logo.png')}}" width="75" height="75" alt="logo">
        <a class="navbar-brand mx-5 text-dark-emphasis" href="#">Guarderia Joseph Lancaster</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link mx-5 text-light" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-5 text-light" href="/indexService">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-5 text-light" href="/indexProgram">Nuestro programa</a>
                </li>
                <li class="nav-item">
                    <a href="/preRegister" class="nav-link mx-5 text-light">Pre-registro</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @if (Route::has('login'))
                        @auth
                        @if (Auth::user()->usertype == 'admin')
                        <a href="{{ url('admin/dashboard') }}" class="btn btn-success btn-sm ms-2" type="button">
                            Perfil Administrador
                        </a>
                        @else
                        <a href="{{ url('/dashboard') }}" class="btn btn-success btn-sm ms-2" type="button">
                            Perfil
                        </a>
                        @endif
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-sm ms-2" type="button">
                            Iniciar Sesión
                        </a>
                        @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
