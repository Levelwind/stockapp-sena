<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <p class="section-tag">Nuevo acceso</p>
            <div>
                <h1 class="text-3xl font-semibold text-white">Crea tu cuenta y conecta el flujo.</h1>
                <p class="mt-2 text-sm leading-6 text-slate-300">
                    Registra un usuario para entrar al sistema y continuar con la gestion de inventario desde una interfaz mas ordenada.
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="field-label">Nombre completo</label>
                <div class="relative">
                    <span class="field-input-icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" class="field-input pl-11" placeholder="Nombre del usuario" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="email" class="field-label">Correo electronico</label>
                <div class="relative">
                    <span class="field-input-icon">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </span>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username" class="field-input pl-11" placeholder="correo@empresa.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="password" class="field-label">Contrasena</label>
                    <div class="relative">
                        <span class="field-input-icon">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="new-password" class="field-input pl-11" placeholder="Minimo 8 caracteres" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <label for="password_confirmation" class="field-label">Confirmar contrasena</label>
                    <div class="relative">
                        <span class="field-input-icon">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="field-input pl-11" placeholder="Repite la contrasena" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 text-sm leading-6 text-slate-300">
                Usa un correo valido y una contrasena segura para mantener la cuenta protegida dentro del flujo del sistema.
            </div>

            <button type="submit" class="btn-primary w-full">
                Crear cuenta
            </button>
        </form>

        <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 text-sm text-slate-300">
            <span class="text-slate-400">Ya tienes acceso?</span>
            <a href="{{ route('login') }}" class="ml-1 font-semibold text-white transition hover:text-bento-highlight">
                Inicia sesion
            </a>
        </div>
    </div>
</x-guest-layout>
