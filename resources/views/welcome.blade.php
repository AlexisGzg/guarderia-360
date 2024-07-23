<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    @include('components.navbar')
                </header>

                <main class="mt-5 text-success-emphasis">
                    <!-- Alerta de bienvenida -->
                    <div class="container text-success-emphasis">
                        <div class="alert alert-dismissible alert-success text-success-emphasis">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong class="">Bienvenido!</strong> No olvides revisan la seccion de servicios y cotizar con nostros. <a href="/indexService" class="alert-link">Ver todos los servicios</a>.
                        </div>
                    </div>

                    <!-- Inicio de la seccion 1 -->
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-8">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/banner1.jpg')}}" class="border border-5 w-50" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/banner2.jpg')}}" class="border border-5 w-75" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/banner3.jpg')}}" class="border border-5 w-75" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-success-emphasis bg-success mx-3 my-4">
                                    <div class="card-header">
                                        <h4 class="p-1">
                                            Bienvenido a nuestra guardería
                                        </h4>
                                    </div>

                                    <div class="container text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">El mejor espacio para tu pequeño</h5>
                                            <p class="card-text">En Guarderías Gigi trabajamos para que nuestros bebes, niños y niñas se desarrollen física y emocionalmente en un ambiente seguro, sano, afectivo y divertido.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">

                        <!-- Inicio de la seccion 2 -->
                        <div class="container text-center mt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="card border-success mb-3 w-5 h-5">
                                        <img src="{{ asset('images/img.jpg')}}" class="mx-auto w-100" alt="...">
                                        <div class="card-header">SUS PRIMEROS PASOS</div>
                                        <div class="card-body">
                                            <p class="card-text">Las primeras etapas de la vida son fundamentales para un buen desarrollo en el futuro.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-success mb-3 w-5 h-5">
                                        <img src="{{ asset('images/social.jpg')}}" class="mx-auto w-100" alt="...">
                                        <div class="card-header">SU PREPARACIÓN</div>
                                        <div class="card-body">
                                            <p class="card-text">Aprendizaje significativo.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-success mb-3 w-5 h-5">
                                        <img src="{{ asset('images/danza.jpg')}}" class="mx-auto w-100" alt="...">
                                        <div class="card-header">SU CRECIMIENTO</div>
                                        <div class="card-body">
                                            <p class="card-text">A partir de las necesidades del niño atendiendo cada paso en su proceso evolutivo.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">
                    </div>

                    @include('components.footer')
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>