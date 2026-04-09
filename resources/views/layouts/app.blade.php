<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'StockApp Sena'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|fraunces:600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-20 top-20 h-72 w-72 rounded-full bg-bento-primary/18 blur-[110px] animate-pulse-soft"></div>
        <div class="absolute right-0 top-1/3 h-80 w-80 rounded-full bg-bento-accent/12 blur-[130px] animate-float-soft"></div>
        <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-bento-highlight/8 blur-[110px] animate-drift"></div>
    </div>

    <div class="app-shell pb-12 pt-6 sm:px-6 lg:px-8 lg:pt-8">
        @include('layouts.navigation')

        @hasSection('header')
            <header class="mt-6" data-reveal>
                <div class="surface-card px-6 py-5 sm:px-8">
                    @yield('header')
                </div>
            </header>
        @elseif(isset($header))
            <header class="mt-6" data-reveal>
                <div class="surface-card px-6 py-5 sm:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        @if (session('success'))
            <div class="mt-6" data-reveal>
                <div class="flash-success">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mt-6" data-reveal>
                <div class="flash-error">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <main class="pt-6">
            @hasSection('content')
                @yield('content')
            @else
                <div class="surface-card p-6 sm:p-8" data-reveal>
                    {{ $slot ?? '' }}
                </div>
            @endif
        </main>
    </div>
</body>
</html>
