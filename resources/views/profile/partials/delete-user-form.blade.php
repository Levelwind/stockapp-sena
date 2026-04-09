<section class="space-y-6">
    <header>
        <p class="section-tag">Zona sensible</p>
        <h2 class="mt-5 text-2xl font-semibold text-white">
            Eliminar cuenta
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-300">
            Esta accion elimina de forma permanente el acceso y los datos asociados a la cuenta.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Eliminar cuenta</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-semibold text-white">
                Confirmar eliminacion de cuenta
            </h2>

            <p class="mt-3 text-sm leading-6 text-slate-300">
                Esta accion no se puede deshacer. Escribe tu contrasena para confirmar la eliminacion definitiva.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Contrasena" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="Contrasena"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancelar
                </x-secondary-button>

                <x-danger-button>
                    Eliminar cuenta
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
