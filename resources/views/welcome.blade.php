<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'StockApp Sena') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|fraunces:600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-28 top-0 h-80 w-80 rounded-full bg-bento-primary/18 blur-[120px] animate-pulse-soft"></div>
        <div class="absolute right-0 top-1/4 h-96 w-96 rounded-full bg-bento-accent/12 blur-[140px] animate-float-soft"></div>
        <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-bento-highlight/8 blur-[120px] animate-drift"></div>
    </div>

    <div class="app-shell pb-14 pt-6 sm:px-6 lg:px-8 lg:pt-8">
        <header class="surface-panel px-4 py-4 sm:px-6" data-reveal>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-bento-primary to-[#139289] text-white shadow-[0_18px_45px_rgba(15,118,110,0.3)]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">StockApp</p>
                        <p class="text-sm font-semibold text-white">Gestion central de inventario</p>
                    </div>
                </div>

                <div class="hidden items-center gap-2 lg:flex">
                    <a href="#modulos" class="menu-link">Modulos</a>
                    <a href="#flujo" class="menu-link">Flujo</a>
                    <a href="#contacto" class="menu-link">Acceso</a>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary">
                            Ir al panel
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-secondary">
                            Iniciar sesion
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary">
                                Crear cuenta
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </header>

        <main class="mt-8 space-y-8">
            <section class="grid gap-6 xl:grid-cols-[1.08fr_0.92fr]">
                <div class="surface-card p-8 sm:p-10 xl:p-12" data-reveal>
                    <div class="hero-chip">
                        <span class="status-dot"></span>
                        Inventario profesional para operaciones reales
                    </div>

                    <div class="mt-8 max-w-3xl">
                        <h1 class="text-4xl font-semibold leading-tight text-white sm:text-5xl xl:text-6xl">
                            Controla compras, stock y salidas con una experiencia clara desde el primer ingreso.
                        </h1>
                        <p class="mt-6 max-w-2xl text-base leading-7 text-slate-300 sm:text-lg">
                            StockApp Sena concentra productos, categorias, terceros, movimientos y reportes en un flujo ordenado, estetico y listo para trabajar sin friccion.
                        </p>
                    </div>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn-primary">
                                Abrir dashboard
                            </a>
                            <a href="{{ route('reportes.inventario') }}" class="btn-secondary">
                                Ver reporte de inventario
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-primary">
                                Empezar ahora
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-secondary">
                                    Registrar usuario
                                </a>
                            @endif
                        @endauth
                    </div>

                    <div class="mt-10 grid gap-4 md:grid-cols-3">
                        <div class="metric-card">
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Panel inicial</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Mas claro</p>
                            <p class="mt-2 text-sm leading-6 text-slate-400">Resumen de alertas, actividad y accesos directos en la primera vista.</p>
                        </div>

                        <div class="metric-card">
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Menus</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Agrupados</p>
                            <p class="mt-2 text-sm leading-6 text-slate-400">Operaciones, catalogos, terceros y reportes ordenados segun el flujo real.</p>
                        </div>

                        <div class="metric-card">
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Auth flow</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Conectado</p>
                            <p class="mt-2 text-sm leading-6 text-slate-400">Login, registro y recuperacion con una misma identidad visual.</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="surface-card p-6 sm:p-8" data-reveal data-delay="120">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Vista sugerida</p>
                                <h2 class="mt-2 text-2xl font-semibold text-white">Panel sobrio, rapido y bien conectado.</h2>
                            </div>
                            <div class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs font-medium text-slate-300">
                                Inicio
                            </div>
                        </div>

                        <div class="mt-6 space-y-4">
                            <div class="surface-soft p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Alertas de stock</p>
                                        <p class="mt-2 text-3xl font-semibold text-white">03</p>
                                    </div>
                                    <div class="rounded-2xl bg-bento-accent/15 px-3 py-2 text-sm font-semibold text-amber-200">
                                        Prioridad media
                                    </div>
                                </div>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="surface-soft p-4">
                                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Entradas</p>
                                    <div class="mt-3 h-2 rounded-full bg-white/5">
                                        <div class="h-2 w-3/4 rounded-full bg-gradient-to-r from-bento-primary to-bento-highlight"></div>
                                    </div>
                                    <p class="mt-3 text-sm text-slate-300">Operaciones registradas con trazabilidad.</p>
                                </div>

                                <div class="surface-soft p-4">
                                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Salidas</p>
                                    <div class="mt-3 h-2 rounded-full bg-white/5">
                                        <div class="h-2 w-2/3 rounded-full bg-gradient-to-r from-bento-accent to-orange-300"></div>
                                    </div>
                                    <p class="mt-3 text-sm text-slate-300">Flujo sincronizado con movimientos recientes.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-1 2xl:grid-cols-2">
                        <div class="feature-card" data-reveal data-delay="180">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-bento-primary/15 text-bento-highlight">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 17v-6h13M9 5l-7 7 7 7" />
                                </svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-white">Entradas y salidas</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-400">El sistema presenta operaciones clave con jerarquia, contexto y accesos mas rapidos.</p>
                        </div>

                        <div class="feature-card" data-reveal data-delay="240">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-bento-primary/15 text-bento-highlight">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h18M6 3h12a1 1 0 011 1v16l-4-3-4 3-4-3-4 3V4a1 1 0 011-1z" />
                                </svg>
                            </div>
                            <h3 class="mt-5 text-xl font-semibold text-white">Catalogo ordenado</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-400">Categorias, productos y terceros quedan bajo una misma logica visual y de navegacion.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="modulos" class="grid gap-6 lg:grid-cols-4" data-reveal>
                <div class="feature-card">
                    <p class="section-tag">01</p>
                    <h3 class="mt-5 text-xl font-semibold text-white">Catalogos</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">Categorias, subcategorias y productos con mejor orden visual y lectura mas limpia.</p>
                </div>

                <div class="feature-card">
                    <p class="section-tag">02</p>
                    <h3 class="mt-5 text-xl font-semibold text-white">Operaciones</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">Entradas, salidas y movimientos agrupados segun el flujo real de inventario.</p>
                </div>

                <div class="feature-card">
                    <p class="section-tag">03</p>
                    <h3 class="mt-5 text-xl font-semibold text-white">Terceros</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">Clientes y proveedores visibles dentro del mismo lenguaje visual del sistema.</p>
                </div>

                <div class="feature-card">
                    <p class="section-tag">04</p>
                    <h3 class="mt-5 text-xl font-semibold text-white">Reportes</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">Resumen de inventario y alertas para revisar el estado del negocio sin ruido.</p>
                </div>
            </section>

            <section id="flujo" class="surface-card p-8 sm:p-10" data-reveal>
                <div class="max-w-3xl">
                    <p class="section-tag">Flujo conectado</p>
                    <h2 class="mt-5 text-3xl font-semibold text-white sm:text-4xl">
                        La pagina ahora acompana el recorrido completo: inicio, acceso y panel operativo.
                    </h2>
                    <p class="mt-4 text-base leading-7 text-slate-300">
                        La propuesta visual prioriza claridad, coherencia y sensacion de producto terminado sin caer en colores artificiales ni estilos exagerados.
                    </p>
                </div>

                <div class="mt-10 grid gap-6 lg:grid-cols-3">
                    <div class="surface-soft p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-bento-primary/15 text-bento-highlight">1</div>
                        <h3 class="mt-5 text-xl font-semibold text-white">Inicio con contexto</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-400">La home explica rapido de que trata la plataforma y dirige al usuario al siguiente paso correcto.</p>
                    </div>

                    <div class="surface-soft p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-bento-primary/15 text-bento-highlight">2</div>
                        <h3 class="mt-5 text-xl font-semibold text-white">Auth consistente</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-400">Login, registro y recuperacion usan una misma composicion para que nada se sienta suelto.</p>
                    </div>

                    <div class="surface-soft p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-bento-primary/15 text-bento-highlight">3</div>
                        <h3 class="mt-5 text-xl font-semibold text-white">Panel con prioridad</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-400">Dashboard y navegacion jerarquizan accesos utiles, alertas y actividad real del inventario.</p>
                    </div>
                </div>
            </section>

            <section id="contacto" class="surface-card p-8 sm:p-10" data-reveal>
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div class="max-w-2xl">
                        <p class="section-tag">Acceso</p>
                        <h2 class="mt-5 text-3xl font-semibold text-white sm:text-4xl">Todo el flujo listo para entrar y trabajar.</h2>
                        <p class="mt-4 text-base leading-7 text-slate-300">
                            El sistema queda preparado para que el usuario comprenda la plataforma desde el inicio y pase a operar sin sentir saltos visuales entre pantallas.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn-primary">Abrir panel</a>
                        @else
                            <a href="{{ route('login') }}" class="btn-secondary">Iniciar sesion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-primary">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
