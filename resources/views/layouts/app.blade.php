<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-100 text-slate-900">
        <div class="relative min-h-screen overflow-hidden"
        x-data="{ sidebarOpen: JSON.parse(localStorage.getItem('sidebarOpen') ?? 'true') }"
        x-init="$watch('sidebarOpen', val => localStorage.setItem('sidebarOpen', val))"
        style="
            background:
                radial-gradient(circle at 22% 10%, rgba(242, 177, 154, 0.24) 0%, rgba(242,178,154,0) 40%),
                radial-gradient(circle at 8% 85%, rgba(169, 208, 144, 0.55) 0%, rgba(169, 208, 144, 0) 35%),
                radial-gradient(circle at 48% 92%, rgba(242, 177, 154, 0.19) 0%, rgba(242, 178, 154, 0) 38%),
                radial-gradient(circle at 92% 18%, rgba(175, 225, 240, 0.55) 0%, rgba(175, 225, 240, 0) 35%),
                linear-gradient(135deg, #f8f7f2 0%, #f7f6f3 100%);
        ">

            <div class="min-h-screen flex">
                {{-- Sidebar --}}
                <aside
                    class="bg-white/35 text-slate-800 backdrop-blur-2xl flex flex-col transition-all duration-300 ease-in-out"
                    :class="sidebarOpen ? 'w-72' : 'w-[4.5rem]'"
                >
                    {{-- Logo / Header --}}
                    <div class="px-6 py-6 flex items-center justify-between">
                        <div x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="overflow-hidden">
                            <h1 class="text-2xl font-bold tracking-tight text-indigo-500 whitespace-nowrap">Dziennik Praktykanta</h1>
                            <p class="mt-2 text-sm text-slate-500 tracking-wide whitespace-nowrap">Panel użytkownika</p>
                        </div>
                        {{-- Ikona "DP" gdy sidebar jest zwinięty --}}
                        <div x-show="!sidebarOpen" class="flex items-center justify-center w-full">
                            <span class="text-xl font-bold text-indigo-500">DP</span>
                        </div>
                    </div>

                    {{-- Toggle button --}}
                    <div class="px-4 mb-2">
                        <button
                            @click="sidebarOpen = !sidebarOpen"
                            class="w-full flex items-center justify-center rounded-xl px-3 py-2.5 text-slate-400 transition hover:bg-white/50 hover:text-indigo-500"
                            :title="sidebarOpen ? 'Zwiń menu' : 'Rozwiń menu'"
                        >
                            {{-- Strzałka w lewo (zwiń) --}}
                            <svg
                                x-show="sidebarOpen"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                            {{-- Strzałka w prawo (rozwiń) --}}
                            <svg
                                x-show="!sidebarOpen"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    {{-- Nawigacja --}}
                    <nav class="flex-1 px-4 py-6 space-y-6">
                        {{-- Sekcja: Dziennik --}}
                        <div>
                            <p
                                class="text-xs uppercase tracking-wider text-slate-400 mb-3 px-1 whitespace-nowrap overflow-hidden transition-opacity duration-200"
                                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 h-0 mb-0'"
                            >
                                Dziennik
                            </p>

                            <div class="space-y-2">
                                {{-- Panel główny --}}
                                <a href="{{ route('dashboard') }}"
                                    class="{{ request()->routeIs('dashboard')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && 'justify-center !px-0 !gap-0'"
                                    x-data
                                    :title="!sidebarOpen ? 'Panel główny' : ''"
                                >
                                    <x-icons.home />
                                    <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Panel główny</span>
                                </a>

                                {{-- Wpisy --}}
                                <a href="{{ route('entries.index') }}"
                                    class="{{ request()->routeIs('entries.*')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && 'justify-center !px-0 !gap-0'"
                                    :title="!sidebarOpen ? 'Wpisy' : ''"
                                >
                                    <x-icons.entries />
                                    <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Wpisy</span>
                                </a>

                                {{-- Drukowanie --}}
                                <a href="{{ route('print.index') }}"
                                    class="{{ request()->routeIs('print.*')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && 'justify-center !px-0 !gap-0'"
                                    :title="!sidebarOpen ? 'Drukowanie' : ''"
                                >
                                    <x-icons.printing />
                                    <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Drukowanie</span>
                                </a>
                            </div>
                        </div>

                        {{-- Sekcja: Ustawienia --}}
                        <div>
                            <p
                                class="text-xs uppercase tracking-wider text-slate-400 mb-3 px-1 whitespace-nowrap overflow-hidden transition-opacity duration-200"
                                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 h-0 mb-0'"
                            >
                                Ustawienia
                            </p>

                            <div class="space-y-2">
                                {{-- Konto --}}
                                <a href="{{ route('settings.account') }}"
                                    class="{{ request()->routeIs('settings.account')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && 'justify-center !px-0 !gap-0'"
                                    :title="!sidebarOpen ? 'Konto' : ''"
                                >
                                    <x-icons.account />
                                    <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Konto</span>
                                </a>

                                {{-- Szkoła --}}
                                <a href="{{ route('settings.school') }}"
                                    class="{{ request()->routeIs('settings.school')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && 'justify-center !px-0 !gap-0'"
                                    :title="!sidebarOpen ? 'Szkoła' : ''"
                                >
                                    <x-icons.school />
                                    <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Szkoła</span>
                                </a>

                                {{-- Firma --}}
                                <a href="{{ route('settings.company') }}"
                                    class="{{ request()->routeIs('settings.company')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && 'justify-center !px-0 !gap-0'"
                                    :title="!sidebarOpen ? 'Firma' : ''"
                                >
                                    <x-icons.company />
                                    <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Firma</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </aside>

                {{-- Główna treść --}}
                <div class="flex-1 flex flex-col">
                    <header class="mx-6 mt-6 mb-2">
                        <div class="flex items-center justify-between ">
                            <h2 class="text-xl font-semibold text-slate-800">
                                {{ $header ?? 'Panel użytkownika' }}
                            </h2>

                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-3 rounded-full bg-white/70 pl-1.5 pr-4 py-1.5">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 text-white text-sm font-bold shadow-sm">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-semibold text-slate-700 tracking-wide">
                                        {{ auth()->user()->name }}
                                    </span>
                                </div>

                                <a href="{{ route('settings.account') }}"
                                   class="inline-flex items-center gap-1.5 rounded-xl bg-white/70 px-4 py-2 text-sm font-medium text-slate-600 shadow-sm transition-all hover:bg-white hover:text-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-xl bg-white/70 px-4 py-2 text-sm font-medium text-slate-500 shadow-sm transition-all  hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Wyloguj
                                    </button>
                                </form>
                            </div>
                        </div>
                    </header>

                    <main class="flex-1 p-10 mt-4 mr-6 rounded-tr-2xl
                        bg-white/60 backdrop-blur-xl
                        shadow-[0_0_40px_-12px_rgba(0,0,0,0.06)]
                        ring-1 ring-white/60 ring-l-0">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>