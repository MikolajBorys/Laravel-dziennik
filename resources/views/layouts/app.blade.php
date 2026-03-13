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
        x-data="{
            sidebarOpen: window.innerWidth >= 1024 ? JSON.parse(localStorage.getItem('sidebarOpen') ?? 'true') : false,
            mobileMenu: false
        }"
        x-init="$watch('sidebarOpen', val => { if(window.innerWidth >= 1024) localStorage.setItem('sidebarOpen', val) })"
        @resize.window="if(window.innerWidth >= 1024) { mobileMenu = false } else { sidebarOpen = false }"
        style="
            background:
                radial-gradient(circle at 22% 10%, rgba(242, 177, 154, 0.24) 0%, rgba(242,178,154,0) 40%),
                radial-gradient(circle at 8% 85%, rgba(169, 208, 144, 0.55) 0%, rgba(169, 208, 144, 0) 35%),
                radial-gradient(circle at 48% 92%, rgba(242, 177, 154, 0.19) 0%, rgba(242, 178, 154, 0) 38%),
                radial-gradient(circle at 92% 18%, rgba(175, 225, 240, 0.55) 0%, rgba(175, 225, 240, 0) 35%),
                linear-gradient(135deg, #f8f7f2 0%, #f7f6f3 100%);
        ">

            <div x-show="mobileMenu"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-30 bg-slate-900/10 backdrop-blur-sm lg:hidden"
                 @click="mobileMenu = false"
                 style="display: none;"></div>

            <div class="min-h-screen flex">
                <aside
                    class="bg-white/35 text-slate-800 backdrop-blur-2xl flex flex-col transition-all duration-300 ease-in-out
                           fixed inset-y-0 left-0 z-40
                           lg:relative lg:z-auto"
                           :class="[
                            mobileMenu ? 'translate-x-0 w-[85vw] md:w-80' : '-translate-x-full w-[85vw] md:w-80',
                            !mobileMenu && (sidebarOpen ? 'lg:translate-x-0 lg:w-72' : 'lg:translate-x-0 lg:w-[4.5rem]')
                        ]"
                >
                    {{-- Logo / Header --}}
                    <div class="px-6 py-6 flex items-center justify-between">
                        <div x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="overflow-hidden">
                            <h1 class="text-2xl font-bold tracking-tight text-indigo-500 whitespace-nowrap">Dziennik Praktykanta</h1>
                            <p class="mt-2 text-sm text-slate-500 tracking-wide whitespace-nowrap">Panel użytkownika</p>
                        </div>
                        {{-- Ikona "DP" gdy sidebar jest zwinięty (tylko desktop) --}}
                        <div x-show="!sidebarOpen && !mobileMenu" class="hidden lg:flex items-center justify-center w-full">
                            <span class="text-xl font-bold text-indigo-500">DP</span>
                        </div>
                        {{-- Zamknij mobile menu --}}
                        <button @click="mobileMenu = false" class="lg:hidden text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    {{-- Toggle button (tylko desktop) --}}
                    <div class="hidden lg:block px-4 mb-2">
                        <button
                            @click="sidebarOpen = !sidebarOpen"
                            class="w-full flex items-center justify-center rounded-xl px-3 py-2.5 text-slate-400 transition hover:bg-white/50 hover:text-indigo-500"
                            :title="sidebarOpen ? 'Zwiń menu' : 'Rozwiń menu'"
                        >
                            <svg
                                x-show="sidebarOpen"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                            <svg
                                x-show="!sidebarOpen"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    {{-- Nawigacja --}}
                    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
                        {{-- Sekcja: Dziennik --}}
                        <div>
                            <p
                                class="text-xs uppercase tracking-wider text-slate-400 mb-3 px-1 whitespace-nowrap overflow-hidden transition-opacity duration-200"
                                :class="(sidebarOpen || mobileMenu) ? 'opacity-100' : 'opacity-0 h-0 mb-0'"
                            >
                                Dziennik
                            </p>

                            <div class="space-y-2">
                                <a href="{{ route('dashboard') }}"
                                    @click="mobileMenu = false"
                                    class="{{ request()->routeIs('dashboard')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && !mobileMenu && 'lg:justify-center lg:!px-0 lg:!gap-0'"
                                    :title="!sidebarOpen && !mobileMenu ? 'Panel główny' : ''"
                                >
                                    <x-icons.home />
                                    <span x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Panel główny</span>
                                </a>

                                <a href="{{ route('entries.index') }}"
                                    @click="mobileMenu = false"
                                    class="{{ request()->routeIs('entries.*')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && !mobileMenu && 'lg:justify-center lg:!px-0 lg:!gap-0'"
                                    :title="!sidebarOpen && !mobileMenu ? 'Wpisy' : ''"
                                >
                                    <x-icons.entries />
                                    <span x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Wpisy</span>
                                </a>

                                <a href="{{ route('print.index') }}"
                                    @click="mobileMenu = false"
                                    class="{{ request()->routeIs('print.*')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && !mobileMenu && 'lg:justify-center lg:!px-0 lg:!gap-0'"
                                    :title="!sidebarOpen && !mobileMenu ? 'Drukowanie' : ''"
                                >
                                    <x-icons.printing />
                                    <span x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Drukowanie</span>
                                </a>
                            </div>
                        </div>

                        {{-- Sekcja: Ustawienia --}}
                        <div>
                            <p
                                class="text-xs uppercase tracking-wider text-slate-400 mb-3 px-1 whitespace-nowrap overflow-hidden transition-opacity duration-200"
                                :class="(sidebarOpen || mobileMenu) ? 'opacity-100' : 'opacity-0 h-0 mb-0'"
                            >
                                Ustawienia
                            </p>

                            <div class="space-y-2">
                                <a href="{{ route('settings.account') }}"
                                    @click="mobileMenu = false"
                                    class="{{ request()->routeIs('settings.account')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && !mobileMenu && 'lg:justify-center lg:!px-0 lg:!gap-0'"
                                    :title="!sidebarOpen && !mobileMenu ? 'Konto' : ''"
                                >
                                    <x-icons.account />
                                    <span x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Konto</span>
                                </a>

                                <a href="{{ route('settings.school') }}"
                                    @click="mobileMenu = false"
                                    class="{{ request()->routeIs('settings.school')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && !mobileMenu && 'lg:justify-center lg:!px-0 lg:!gap-0'"
                                    :title="!sidebarOpen && !mobileMenu ? 'Szkoła' : ''"
                                >
                                    <x-icons.school />
                                    <span x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Szkoła</span>
                                </a>

                                <a href="{{ route('settings.company') }}"
                                    @click="mobileMenu = false"
                                    class="{{ request()->routeIs('settings.company')
                                        ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 tracking-wide text-[15px] font-bold text-indigo-500 shadow-sm'
                                        : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-bold text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}"
                                    :class="!sidebarOpen && !mobileMenu && 'lg:justify-center lg:!px-0 lg:!gap-0'"
                                    :title="!sidebarOpen && !mobileMenu ? 'Firma' : ''"
                                >
                                    <x-icons.company />
                                    <span x-show="sidebarOpen || mobileMenu" x-transition:enter="transition-opacity duration-200" x-transition:leave="transition-opacity duration-150" class="whitespace-nowrap">Firma</span>
                                </a>
                            </div>
                        </div>
                    </nav>

                    {{-- User info na dole sidebara (mobile) --}}
                    <div class="lg:hidden px-4 py-4 border-t border-slate-200/40">
                        <div class="flex items-center gap-3 px-2">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 text-white text-sm font-bold shadow-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-700 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="mt-3">
                            @csrf
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 rounded-xl bg-white/50 border border-slate-200/60 px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-red-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Wyloguj się
                            </button>
                        </form>
                    </div>
                </aside>

                <div class="flex-1 flex flex-col min-w-0">

                    {{-- Header --}}
                    <header class="mx-3 sm:mx-4 lg:mx-6 mt-3 sm:mt-4 lg:mt-6 mb-2">
                        <div class="flex items-center justify-between">

                            {{-- Lewa strona: hamburger + tytuł --}}
                            <div class="flex items-center gap-3">
                                <button @click="mobileMenu = true"
                                        class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/60 border border-white/70 text-slate-600 hover:bg-white/80 hover:text-indigo-500 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                                    </svg>
                                </button>

                                <h2 class="text-lg sm:text-xl font-semibold text-slate-800">
                                    {{ $header ?? 'Panel użytkownika' }}
                                </h2>
                            </div>

                            {{-- Prawa strona: user info (desktop) --}}
                            <div class="hidden lg:flex items-center gap-4">
                                <div class="flex items-center gap-2.5 rounded-full bg-white/70 pl-1.5 pr-4 py-1.5">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 text-white text-sm font-bold shadow-sm">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-semibold text-slate-700 tracking-wide">
                                        {{ auth()->user()->name }}
                                    </span>
                                </div>

                                <a href="{{ route('settings.account') }}"
                                   class="inline-flex items-center gap-1.5 rounded-xl bg-white/70 px-4 py-2 text-sm font-medium text-slate-600 shadow-sm transition-all hover:bg-white hover:text-indigo-500">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-xl bg-white/70 px-4 py-2 text-sm font-medium text-slate-500 shadow-sm transition-all hover:text-red-500">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Wyloguj
                                    </button>
                                </form>
                            </div>

                            {{-- Prawa strona: avatar (mobile) --}}
                            <div class="flex lg:hidden items-center gap-2">
                                <a href="{{ route('settings.account') }}"
                                   class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 text-white text-sm font-bold shadow-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </a>
                            </div>

                        </div>
                    </header>

                    {{-- Main --}}
                    <main class="flex-1 p-4 sm:p-6 lg:p-10 mt-2 sm:mt-3 lg:mt-4 mr-0 lg:mr-6 rounded-tr-none lg:rounded-tr-2xl
                        bg-white/60 backdrop-blur-xl
                        shadow-[0_0_40px_-12px_rgba(0,0,0,0.06)]
                        border-t border-white/60 lg:border-t-0 lg:ring-1 lg:ring-white/60">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>