@php
    $operacionesActive = request()->routeIs('entradas.*') || request()->routeIs('salidas.*') || request()->routeIs('movimientos.*') || request()->routeIs('facturas.*');
    $catalogosActive = request()->routeIs('categorias.*') || request()->routeIs('subcategorias.*') || request()->routeIs('productos.*');
    $tercerosActive = request()->routeIs('proveedores.*') || request()->routeIs('clientes.*');

    $operaciones = [
        ['label' => 'Entradas', 'route' => 'entradas.index', 'match' => 'entradas.*'],
        ['label' => 'Salidas', 'route' => 'salidas.index', 'match' => 'salidas.*'],
        ['label' => 'Movimientos', 'route' => 'movimientos.index', 'match' => 'movimientos.*'],
        ['label' => 'Facturas', 'route' => 'facturas.index', 'match' => 'facturas.*'],
    ];

    $catalogos = [
        ['label' => 'Categorias', 'route' => 'categorias.index', 'match' => 'categorias.*'],
        ['label' => 'Subcategorias', 'route' => 'subcategorias.index', 'match' => 'subcategorias.*'],
        ['label' => 'Productos', 'route' => 'productos.index', 'match' => 'productos.*'],
    ];

    $terceros = [
        ['label' => 'Proveedores', 'route' => 'proveedores.index', 'match' => 'proveedores.*'],
        ['label' => 'Clientes', 'route' => 'clientes.index', 'match' => 'clientes.*'],
    ];

    $mobileLinks = [
        ['label' => 'Resumen', 'route' => 'dashboard', 'match' => 'dashboard'],
        ['label' => 'Entradas', 'route' => 'entradas.index', 'match' => 'entradas.*'],
        ['label' => 'Salidas', 'route' => 'salidas.index', 'match' => 'salidas.*'],
        ['label' => 'Movimientos', 'route' => 'movimientos.index', 'match' => 'movimientos.*'],
        ['label' => 'Facturas', 'route' => 'facturas.index', 'match' => 'facturas.*'],
        ['label' => 'Categorias', 'route' => 'categorias.index', 'match' => 'categorias.*'],
        ['label' => 'Subcategorias', 'route' => 'subcategorias.index', 'match' => 'subcategorias.*'],
        ['label' => 'Productos', 'route' => 'productos.index', 'match' => 'productos.*'],
        ['label' => 'Proveedores', 'route' => 'proveedores.index', 'match' => 'proveedores.*'],
        ['label' => 'Clientes', 'route' => 'clientes.index', 'match' => 'clientes.*'],
        ['label' => 'Reporte inventario', 'route' => 'reportes.inventario', 'match' => 'reportes.inventario'],
    ];
@endphp

<nav x-data="{ open: false }" data-app-nav class="surface-panel sticky top-4 z-50 px-4 py-3 sm:px-5" data-reveal>
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
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

            <div class="hidden xl:flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.04] px-3 py-2 text-xs font-medium text-slate-300">
                <span class="status-dot"></span>
                Flujo operativo activo
            </div>
        </div>

        <div class="hidden lg:flex items-center gap-2">
            <a href="{{ route('dashboard') }}" @class(['menu-link', 'menu-link-active' => request()->routeIs('dashboard')])>
                Resumen
            </a>

            <x-dropdown align="left" width="w-72">
                <x-slot name="trigger">
                    <button type="button" @class(['menu-link', 'menu-link-active' => $operacionesActive])>
                        Operaciones
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="surface-panel p-2">
                        @foreach ($operaciones as $item)
                            <x-dropdown-link :href="route($item['route'])" @class(['bg-white/[0.06] text-white' => request()->routeIs($item['match'])])>
                                {{ $item['label'] }}
                            </x-dropdown-link>
                        @endforeach
                    </div>
                </x-slot>
            </x-dropdown>

            <x-dropdown align="left" width="w-72">
                <x-slot name="trigger">
                    <button type="button" @class(['menu-link', 'menu-link-active' => $catalogosActive])>
                        Catalogos
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="surface-panel p-2">
                        @foreach ($catalogos as $item)
                            <x-dropdown-link :href="route($item['route'])" @class(['bg-white/[0.06] text-white' => request()->routeIs($item['match'])])>
                                {{ $item['label'] }}
                            </x-dropdown-link>
                        @endforeach
                    </div>
                </x-slot>
            </x-dropdown>

            <x-dropdown align="left" width="w-72">
                <x-slot name="trigger">
                    <button type="button" @class(['menu-link', 'menu-link-active' => $tercerosActive])>
                        Terceros
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="surface-panel p-2">
                        @foreach ($terceros as $item)
                            <x-dropdown-link :href="route($item['route'])" @class(['bg-white/[0.06] text-white' => request()->routeIs($item['match'])])>
                                {{ $item['label'] }}
                            </x-dropdown-link>
                        @endforeach
                    </div>
                </x-slot>
            </x-dropdown>

            <a href="{{ route('reportes.inventario') }}" @class(['menu-link', 'menu-link-active' => request()->routeIs('reportes.inventario')])>
                Reportes
            </a>
        </div>

        <div class="flex items-center gap-3">
            <x-dropdown align="right" width="w-72">
                <x-slot name="trigger">
                    <button type="button" class="hidden items-center gap-3 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2 text-left transition duration-300 hover:border-white/20 hover:bg-white/[0.08] sm:inline-flex">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-bento-primary/15 text-sm font-semibold text-bento-highlight">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="hidden lg:block">
                            <p class="text-xs font-medium uppercase tracking-[0.22em] text-slate-500">Cuenta</p>
                            <p class="text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                        </div>
                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="surface-panel p-2">
                        <div class="px-4 py-3">
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Usuario</p>
                            <p class="mt-2 text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                            <p class="mt-1 text-sm text-slate-400">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <x-dropdown-link :href="url('/')">
                            Ver inicio
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-red-200 hover:bg-red-500/10 hover:text-red-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesion
                            </x-dropdown-link>
                        </form>
                    </div>
                </x-slot>
            </x-dropdown>

            <button @click="open = !open" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/[0.05] text-slate-200 transition duration-300 hover:bg-white/[0.08] lg:hidden">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" x-transition class="mt-4 border-t border-white/10 pt-4 lg:hidden" style="display: none;">
        <div class="grid gap-3 sm:grid-cols-2">
            @foreach ($mobileLinks as $item)
                <a href="{{ route($item['route']) }}" @class(['mobile-link', 'border-bento-primary/30 bg-bento-primary/10 text-white' => request()->routeIs($item['match'])])>
                    <span>{{ $item['label'] }}</span>
                    <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endforeach
        </div>

        <div class="mt-4 rounded-[24px] border border-white/10 bg-white/[0.04] p-4">
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Sesion activa</p>
            <p class="mt-3 text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
            <p class="mt-1 text-sm text-slate-400">{{ Auth::user()->email }}</p>

            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                <a href="{{ route('profile.edit') }}" class="mobile-link">
                    <span>Perfil</span>
                    <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-link w-full justify-between text-red-200">
                        <span>Cerrar sesion</span>
                        <svg class="h-4 w-4 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
