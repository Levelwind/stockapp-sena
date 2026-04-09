<x-guest-layout>
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="space-y-8">
        <div class="space-y-3">
            <p class="section-tag">Acceso seguro</p>
            <div>
                <h1 class="text-3xl font-semibold text-white">Inicia sesion en tu panel.</h1>
                <p class="mt-2 text-sm leading-6 text-slate-300">
                    Consulta el estado del inventario, registra movimientos y revisa alertas desde un solo lugar.
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="field-label">Correo electronico</label>
                <div class="relative">
                    <span class="field-input-icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </span>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="field-input pl-11" placeholder="correo@empresa.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="field-label">Contrasena</label>
                <div class="relative">
                    <span class="field-input-icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <input id="password" name="password" type="password" required autocomplete="current-password" class="field-input pl-11" placeholder="Ingresa tu contrasena" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <label for="remember_me" class="inline-flex items-center gap-3 text-sm text-slate-300">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-white/10 bg-slate-950/60">
                    <span>Mantener sesion</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn-ghost justify-start sm:justify-end">
                        Recuperar contrasena
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-primary w-full">
                Entrar al sistema
            </button>
        </form>

        <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 text-sm text-slate-300">
            <span class="text-slate-400">Aun no tienes cuenta?</span>
            <a href="{{ route('register') }}" class="ml-1 font-semibold text-white transition hover:text-bento-highlight">
                Registrate aqui
            </a>
        </div>
    </div>
</x-guest-layout>
