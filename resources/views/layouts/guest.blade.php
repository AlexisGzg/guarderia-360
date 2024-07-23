<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS (Bootswatch Theme) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/lumen/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans text-gray-900 bg-success-subtle">
    <nav class="navbar navbar-expand-lg bg-success p-2">
        <div class="container-fluid">
            <img src="{{ asset('images/logo.png') }}" width="75" height="75" alt="logo">
            <a class="navbar-link mx-5 text-light btn btn-success" href="/">
                <i class="bi bi-box-arrow-left me-2"></i>Regresar
            </a>
        </div>
    </nav>

    <div class="d-flex flex-column justify-content-center align-items-center bg-light py-6">
        <div class="w-100 sm:max-w-md mt-6 px-6 py-4 bg-success-subtle shadow-md rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    @vite(['resources/js/app.js'])
</body>

</html>
