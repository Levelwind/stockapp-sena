<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StockApp Sena') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|fraunces:600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute -left-24 top-10 h-72 w-72 rounded-full bg-bento-primary/20 blur-[110px] animate-pulse-soft"></div>
            <div class="absolute right-0 top-1/4 h-80 w-80 rounded-full bg-bento-accent/15 blur-[120px] animate-float-soft"></div>
            <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-bento-highlight/10 blur-[100px] animate-drift"></div>
        </div>

        <div class="auth-shell max-w-7xl sm:px-6 lg:grid-cols-[1.08fr_0.92fr] lg:px-8">
            <section class="auth-panel hidden sm:p-10 lg:block lg:p-12" data-reveal>
                <div class="hero-chip">
                    <span class="status-dot"></span>
                    Plataforma conectada
                </div>

                <div class="mt-8 max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.26em] text-slate-400">StockApp Sena</p>
                    <h1 class="mt-4 text-5xl font-semibold leading-tight text-white">
                        Operaciones de inventario claras, ordenadas y listas para el dia a dia.
                    </h1>
                    <p class="mt-6 max-w-xl text-base leading-7 text-slate-300">
                        Accede a un flujo continuo para catalogos, entradas, salidas, facturacion y alertas de stock sin perder contexto ni trazabilidad.
                    </p>
                </div>

                <div class="mt-10 grid gap-4 md:grid-cols-3">
                    <div class="metric-card">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Catalogos</p>
                        <p class="mt-3 text-2xl font-semibold text-white">Organizados</p>
                        <p class="mt-2 text-sm text-slate-400">Productos, categorias y subcategorias en una sola estructura.</p>
                    </div>

                    <div class="metric-card">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Movimientos</p>
                        <p class="mt-3 text-2xl font-semibold text-white">Conectados</p>
                        <p class="mt-2 text-sm text-slate-400">Entradas y salidas ligadas a un flujo operativo consistente.</p>
                    </div>

                    <div class="metric-card">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Reportes</p>
                        <p class="mt-3 text-2xl font-semibold text-white">Listos</p>
                        <p class="mt-2 text-sm text-slate-400">Resumen visual para decisiones rapidas y seguimiento continuo.</p>
                    </div>
                </div>

                <div class="mt-10 surface-soft p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Flujo sugerido</p>
                            <h2 class="mt-2 text-2xl font-semibold text-white">Ingreso simple, operacion estable.</h2>
                        </div>
                        <div class="rounded-full border border-white/10 bg-white/[0.05] px-3 py-1 text-xs font-medium text-slate-300">
                            Laravel + Blade
                        </div>
                    </div>

                    <div class="mt-6 space-y-4">
                        <div class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-bento-primary/15 text-sm font-semibold text-bento-highlight">01</div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Acceso seguro</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Login, registro y recuperacion con la misma linea visual y mensajes claros.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-bento-primary/15 text-sm font-semibold text-bento-highlight">02</div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Panel inicial conectado</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Accesos directos, alertas y actividad reciente desde la primera pantalla.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-bento-primary/15 text-sm font-semibold text-bento-highlight">03</div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Gestion continua</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Menus bien agrupados para entrar rapido a catalogos, terceros, reportes y operaciones.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="auth-panel mx-auto w-full max-w-xl sm:p-10 lg:p-12" data-reveal data-delay="120">
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ url('/') }}" class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-bento-primary to-[#139289] text-white shadow-[0_18px_45px_rgba(15,118,110,0.3)]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">StockApp</p>
                            <p class="text-sm font-semibold text-white">Centro de inventario</p>
                        </div>
                    </a>

                    <a href="{{ url('/') }}" class="btn-ghost">
                        Volver al inicio
                    </a>
                </div>

                <div class="mt-8 rounded-[26px] border border-white/10 bg-slate-950/35 p-6 sm:p-8">
                    {{ $slot }}
                </div>
            </section>
        </div>
    </body>
</html>
