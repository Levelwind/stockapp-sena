<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <p class="section-tag">Nueva contrasena</p>
            <div>
                <h1 class="text-3xl font-semibold text-white">Define una nueva clave de acceso.</h1>
                <p class="mt-2 text-sm leading-6 text-slate-300">
                    Completa los datos y guarda una contrasena nueva para volver a entrar al sistema.
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <x-input-label for="email" value="Correo electronico" />
                <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="Nueva contrasena" />
                <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" placeholder="Nueva contrasena" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Confirmar contrasena" />
                <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma la contrasena" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="btn-primary w-full">
                Guardar contrasena
            </button>
        </form>
    </div>
</x-guest-layout>
