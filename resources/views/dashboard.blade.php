@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@php
    $movimientosHoy = \App\Models\Movimiento::whereDate('created_at', now()->toDateString())->count();
    $totalCatalogos = \App\Models\Categoria::count() + \App\Models\Subcategoria::count();
    $totalTerceros = \App\Models\Proveedor::count() + \App\Models\Cliente::count();
@endphp

<div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
    <section class="surface-card p-8 sm:p-10" data-reveal>
        <div class="hero-chip">
            <span class="status-dot"></span>
            Centro operativo
        </div>

        <div class="mt-8 max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.26em] text-slate-500">Vision general</p>
            <h1 class="mt-4 text-4xl font-semibold leading-tight text-white sm:text-5xl">
                Todo el inventario en una vista mas clara, rapida y conectada.
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-7 text-slate-300">
                Revisa el estado actual del stock, entra a las operaciones mas frecuentes y detecta alertas sin perder tiempo buscando en el menu.
            </p>
        </div>

        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('entradas.create') }}" class="btn-primary">Registrar entrada</a>
            <a href="{{ route('salidas.create') }}" class="btn-secondary">Registrar salida</a>
            <a href="{{ route('reportes.inventario') }}" class="btn-secondary">Ver reporte</a>
        </div>

        <div class="mt-10 grid gap-4 md:grid-cols-3">
            <div class="metric-card">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Hoy</p>
                <p class="mt-3 text-3xl font-semibold text-white">{{ number_format($movimientosHoy) }}</p>
                <p class="mt-2 text-sm text-slate-400">Movimientos registrados en la jornada actual.</p>
            </div>

            <div class="metric-card">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Catalogos</p>
                <p class="mt-3 text-3xl font-semibold text-white">{{ number_format($totalCatalogos) }}</p>
                <p class="mt-2 text-sm text-slate-400">Estructura lista para clasificar el inventario.</p>
            </div>

            <div class="metric-card">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Terceros</p>
                <p class="mt-3 text-3xl font-semibold text-white">{{ number_format($totalTerceros) }}</p>
                <p class="mt-2 text-sm text-slate-400">Clientes y proveedores conectados al flujo de la operacion.</p>
            </div>
        </div>
    </section>

    <section class="surface-card p-6 sm:p-8" data-reveal data-delay="120">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Acciones rapidas</p>
                <h2 class="mt-2 text-2xl font-semibold text-white">Accesos para continuar el trabajo.</h2>
            </div>
            <div class="rounded-full border border-white/10 bg-white/[0.05] px-3 py-1 text-xs font-medium text-slate-300">
                Panel inicial
            </div>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-2">
            <a href="{{ route('productos.index') }}" class="feature-card">
                <p class="section-tag">Catalogo</p>
                <h3 class="mt-4 text-lg font-semibold text-white">Productos</h3>
                <p class="mt-2 text-sm leading-6 text-slate-400">Consulta y actualiza el inventario central.</p>
            </a>

            <a href="{{ route('facturas.index') }}" class="feature-card">
                <p class="section-tag">Operacion</p>
                <h3 class="mt-4 text-lg font-semibold text-white">Facturas</h3>
                <p class="mt-2 text-sm leading-6 text-slate-400">Gestiona documentos ligados a entradas y salidas.</p>
            </a>

            <a href="{{ route('proveedores.index') }}" class="feature-card">
                <p class="section-tag">Terceros</p>
                <h3 class="mt-4 text-lg font-semibold text-white">Proveedores</h3>
                <p class="mt-2 text-sm leading-6 text-slate-400">Mantiene los contactos de abastecimiento a la mano.</p>
            </a>

            <a href="{{ route('reportes.inventario') }}" class="feature-card">
                <p class="section-tag">Reporte</p>
                <h3 class="mt-4 text-lg font-semibold text-white">Inventario</h3>
                <p class="mt-2 text-sm leading-6 text-slate-400">Revisa el estado del stock con un resumen ordenado.</p>
            </a>
        </div>
    </section>
</div>

<div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
    <article class="dashboard-kpi" data-reveal>
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Productos</p>
        <div class="mt-4 flex items-end justify-between gap-4">
            <p class="text-4xl font-semibold text-white">{{ number_format($totalProductos) }}</p>
            <span class="rounded-full bg-white/[0.05] px-3 py-1 text-xs font-medium text-slate-300">Catalogo activo</span>
        </div>
        <p class="mt-3 text-sm text-slate-400">Total de referencias disponibles para operar.</p>
    </article>

    <article class="dashboard-kpi" data-reveal data-delay="80">
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Entradas</p>
        <div class="mt-4 flex items-end justify-between gap-4">
            <p class="text-4xl font-semibold text-white">{{ number_format($totalEntradas) }}</p>
            <span class="rounded-full bg-bento-primary/10 px-3 py-1 text-xs font-medium text-bento-highlight">Flujo de ingreso</span>
        </div>
        <p class="mt-3 text-sm text-slate-400">Registros acumulados para abastecimiento y reposicion.</p>
    </article>

    <article class="dashboard-kpi" data-reveal data-delay="160">
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Salidas</p>
        <div class="mt-4 flex items-end justify-between gap-4">
            <p class="text-4xl font-semibold text-white">{{ number_format($totalSalidas) }}</p>
            <span class="rounded-full bg-bento-accent/10 px-3 py-1 text-xs font-medium text-amber-200">Movimiento de salida</span>
        </div>
        <p class="mt-3 text-sm text-slate-400">Despachos y consumos registrados en la operacion.</p>
    </article>

    <article class="dashboard-kpi" data-reveal data-delay="240">
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Alertas</p>
        <div class="mt-4 flex items-end justify-between gap-4">
            <p class="text-4xl font-semibold text-white">{{ number_format($stockCritico) }}</p>
            <span class="rounded-full bg-red-500/10 px-3 py-1 text-xs font-medium text-red-200">
                {{ $stockCritico > 0 ? 'Atencion' : 'Controlado' }}
            </span>
        </div>
        <p class="mt-3 text-sm text-slate-400">Productos que requieren seguimiento por stock minimo.</p>
    </article>
</div>

<div class="mt-6 grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
    <section class="surface-card p-6 sm:p-8" data-reveal>
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Actividad</p>
                <h2 class="mt-2 text-2xl font-semibold text-white">Movimientos recientes</h2>
            </div>
            <a href="{{ route('movimientos.index') }}" class="btn-ghost">Ver historial</a>
        </div>

        <div class="mt-6 space-y-4">
            @forelse ($ultimosMov as $mov)
                <article class="surface-soft p-5 transition duration-300 hover:bg-white/[0.07]">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl {{ $mov->tipo === 'entrada' ? 'bg-bento-primary/15 text-bento-highlight' : 'bg-bento-accent/15 text-amber-200' }}">
                                @if ($mov->tipo === 'entrada')
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m0 0l-6-6m6 6l6-6" />
                                    </svg>
                                @else
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 0l-6 6m6-6l6 6" />
                                    </svg>
                                @endif
                            </div>

                            <div>
                                <h3 class="text-base font-semibold text-white">{{ $mov->producto->nombre }}</h3>
                                <p class="mt-1 text-sm text-slate-400">
                                    {{ ucfirst($mov->tipo) }} registrada por {{ $mov->user->name ?? 'Sistema' }}
                                </p>
                                <p class="mt-1 text-xs uppercase tracking-[0.18em] text-slate-500">{{ $mov->created_at->format('d M · H:i') }}</p>
                            </div>
                        </div>

                        <div class="text-left sm:text-right">
                            <p class="text-xl font-semibold {{ $mov->tipo === 'entrada' ? 'text-emerald-300' : 'text-amber-200' }}">
                                {{ $mov->tipo === 'entrada' ? '+' : '-' }}{{ $mov->cantidad }}
                            </p>
                            <p class="mt-1 text-sm text-slate-400">{{ $mov->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="surface-soft p-8 text-center">
                    <p class="text-base font-semibold text-white">Todavia no hay movimientos registrados.</p>
                    <p class="mt-2 text-sm text-slate-400">Cuando empiecen a entrar o salir productos, apareceran aqui.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="surface-card p-6 sm:p-8" data-reveal data-delay="120">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Seguimiento</p>
                <h2 class="mt-2 text-2xl font-semibold text-white">Productos en observacion</h2>
            </div>
            <a href="{{ route('entradas.create') }}" class="btn-ghost">Reabastecer</a>
        </div>

        <div class="mt-6 space-y-4">
            @forelse ($stockCriticoList as $prod)
                <article class="surface-soft p-5 transition duration-300 hover:border-red-400/20 hover:bg-red-500/5">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-base font-semibold text-white">{{ $prod->nombre }}</h3>
                            <p class="mt-2 text-sm text-slate-400">Stock actual {{ $prod->stock_actual }} · minimo esperado {{ $prod->stock_minimo }}</p>
                        </div>
                        <a href="{{ route('entradas.create') }}" class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-red-400/20 bg-red-500/10 text-red-100 transition duration-300 hover:bg-red-500/20">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="surface-soft p-8 text-center">
                    <p class="text-base font-semibold text-white">No hay alertas criticas.</p>
                    <p class="mt-2 text-sm text-slate-400">El inventario mantiene niveles seguros segun el stock minimo definido.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
