<x-guest-layout>
    <div class="container mt-5">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="text-center mb-4">
            <h1 class="text-3xl">Bienvenido a Guarderia Joseph Lancaster</h1>
            <p class="lead">Ingresa tu correo electrónico y contraseña para continuar</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Ingresa tu correo electrónico') }}</label>
                <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Ingresa tu contraseña') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Recuerdame') }}</label>
            </div>

            <div class="d-flex justify-content-between">
                @if (Route::has('password.request'))
                <a class="text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('Olvidé mi contraseña?') }}
                </a>
                @endif

                <button type="submit" class="btn btn-success">
                    {{ __('Ingresa') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>