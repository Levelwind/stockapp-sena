<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Mi cuenta</p>
            <h2 class="text-2xl font-semibold text-white">
                Ajustes del perfil
            </h2>
            <p class="text-sm text-slate-300">
                Administra tus datos, actualiza la contrasena y controla el acceso a la cuenta.
            </p>
        </div>
    </x-slot>

    <div class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
        <div class="surface-card p-6 sm:p-8" data-reveal>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="space-y-6">
            <div class="surface-card p-6 sm:p-8" data-reveal data-delay="80">
                @include('profile.partials.update-password-form')
            </div>

            <div class="surface-card border-red-400/15 p-6 sm:p-8" data-reveal data-delay="160">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
