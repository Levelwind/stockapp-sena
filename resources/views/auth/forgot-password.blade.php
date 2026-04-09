<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <p class="section-tag">Recuperacion</p>
            <div>
                <h1 class="text-3xl font-semibold text-white">Restablece el acceso a tu cuenta.</h1>
                <p class="mt-2 text-sm leading-6 text-slate-300">
                    Escribe tu correo y te enviaremos un enlace para crear una nueva contrasena.
                </p>
            </div>
        </div>

        <x-auth-session-status class="mb-0" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" value="Correo electronico" />
                <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="correo@empresa.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button type="submit" class="btn-primary w-full">
                Enviar enlace de recuperacion
            </button>
        </form>

        <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 text-sm text-slate-300">
            <a href="{{ route('login') }}" class="font-semibold text-white transition hover:text-bento-highlight">
                Volver al login
            </a>
        </div>
    </div>
</x-guest-layout>
