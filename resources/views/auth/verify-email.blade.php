<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <p class="section-tag">Verificacion</p>
            <div>
                <h1 class="text-3xl font-semibold text-white">Confirma tu correo antes de continuar.</h1>
                <p class="mt-2 text-sm leading-6 text-slate-300">
                    Revisa el enlace enviado a tu correo. Si no llego, puedes solicitar otro desde aqui.
                </p>
            </div>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="rounded-2xl border border-emerald-400/25 bg-emerald-500/10 px-4 py-3 text-sm font-medium text-emerald-200">
                Enviamos un nuevo enlace de verificacion al correo registrado.
            </div>
        @endif

        <div class="grid gap-4 sm:grid-cols-2">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-primary w-full">
                    Reenviar verificacion
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-secondary w-full">
                    Cerrar sesion
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
