<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pre-registro</title>

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

                    <div class="container mt-5 p-5">
                        <h1>Formulario Completo de Pre-Registro</h1>
                        <form class="form-control my-5">
                            <!-- Datos del Niño -->
                            <div>
                                <label for="child_name" class="form-label">Nombre del Niño:</label>
                                <input type="text" id="child_name" name="child_name" class="form-control" required>
                            </div>
                            <div>
                                <label for="child_gender">Género del Niño:</label>
                                <input type="text" id="child_gender" name="child_gender" class="form-control" required>
                            </div>
                            <div>
                                <label for="child_birthdate">Fecha de Nacimiento del Niño:</label>
                                <input type="date" id="child_birthdate" name="child_birthdate" class="form-control" required>
                            </div>
                            <!-- Datos del Tutor -->
                            <div>
                                <label for="tutor_name">Nombre del Tutor:</label>
                                <input type="text" id="tutor_name" name="tutor_name" class="form-control" required>
                            </div>
                            <div>
                                <label for="tutor_email">Email del Tutor:</label>
                                <input type="email" id="tutor_email" name="tutor_email" class="form-control" required>
                            </div>
                            <div>
                                <label for="tutor_phone">Teléfono del Tutor:</label>
                                <input type="text" id="tutor_phone" name="tutor_phone" class="form-control" required>
                            </div>
                            <div>
                                <label for="tutor_relationship">Relación del Tutor:</label>
                                <input type="text" id="tutor_relationship" name="tutor_relationship" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Completar Registro</button>
                        </form>
                    </div>

                    @include('components.footer')
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>