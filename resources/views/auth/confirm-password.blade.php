<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <p class="section-tag">Confirmacion</p>
            <div>
                <h1 class="text-3xl font-semibold text-white">Confirma tu contrasena para continuar.</h1>
                <p class="mt-2 text-sm leading-6 text-slate-300">
                    Esta zona requiere una validacion adicional para proteger la cuenta.
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="password" value="Contrasena actual" />
                <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="current-password" placeholder="Ingresa tu contrasena" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button type="submit" class="btn-primary w-full">
                Confirmar acceso
            </button>
        </form>
    </div>
</x-guest-layout>
