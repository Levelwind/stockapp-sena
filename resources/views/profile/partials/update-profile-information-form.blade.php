<section>
    <header>
        <p class="section-tag">Datos principales</p>
        <h2 class="mt-5 text-2xl font-semibold text-white">
            Informacion del perfil
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-300">
            Actualiza el nombre de la cuenta y el correo asociado al acceso del sistema.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Correo electronico" />
            <x-text-input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                    <p class="text-sm text-slate-300">
                        Tu correo aun no esta verificado.

                        <button form="send-verification" class="ml-1 font-semibold text-white transition hover:text-bento-highlight">
                            Reenviar correo de verificacion
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-3 text-sm font-medium text-emerald-200">
                            Se envio un nuevo enlace de verificacion a tu correo.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <x-primary-button>Guardar cambios</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-emerald-200"
                >Guardado.</p>
            @endif
        </div>
    </form>
</section>
