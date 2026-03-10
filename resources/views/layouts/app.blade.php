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
        style="
            background:
                radial-gradient(circle at 22% 10%, rgba(242, 177, 154, 0.24) 0%, rgba(242,178,154,0) 40%),

                radial-gradient(circle at 8% 85%, rgba(169, 208, 144, 0.55) 0%, rgba(169, 208, 144, 0) 35%),

                radial-gradient(circle at 48% 92%, rgba(242, 177, 154, 0.19) 0%, rgba(242, 178, 154, 0) 38%),

                radial-gradient(circle at 92% 18%, rgba(175, 225, 240, 0.55) 0%, rgba(175, 225, 240, 0) 35%),

                linear-gradient(135deg, #f8f7f2 0%, #f7f6f3 100%);
        ">

            <div class="min-h-screen flex">
                <aside class="w-72 bg-white/35 text-slate-800 backdrop-blur-2xl flex flex-col">
                    <div class="pointer-events-none absolute inset-0 opacity-[0.4] mix-blend-soft-light" style="background-image: url('{{ asset('images/noise.png') }}'); background-size: 500px;"></div>

                    <div class="px-6 py-6 border-b border-white/20">
                        <h1 class="text-2xl font-bold tracking-tight text-slate-900">Dziennik Praktykanta</h1>
                        <p class="mt-1 text-sm text-slate-500">Panel użytkownika</p>
                    </div>

                    <nav class="flex-1 px-4 py-6 space-y-6">
                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400 mb-3">Dziennik</p>
                            <div class="space-y-2">
                                <a href="{{ route('dashboard') }}"
                                class="{{ request()->routeIs('dashboard')
                                ? 'flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-[15px] font-medium text-indigo-500 shadow-sm'
                                : 'flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-medium text-slate-500 transition hover:bg-white/50 hover:text-slate-800' }}">
                                Dashboard
                                </a>
                                <a href="{{ route('entries.index') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-[15px] font-medium text-slate-500 transition hover:bg-white/50 hover:text-slate-800">
                                    Wpisy
                                </a>
                                <a href="{{ route('print.index') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-[15px] font-medium text-slate-500 transition hover:bg-white/50 hover:text-slate-800">
                                    Drukowanie
                                </a>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400 mb-3">Ustawienia</p>
                            <div class="space-y-2">
                                <a href="{{ route('settings.account') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
                                    Konto
                                </a>
                                <a href="{{ route('settings.school') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
                                    Szkoła
                                </a>
                                <a href="{{ route('settings.company') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
                                    Firma
                                </a>
                            </div>
                        </div>
                    </nav>
                </aside>

                <div class="flex-1 flex flex-col">
                    <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ $header ?? 'Panel użytkownika' }}
                        </h2>

                        <div class="flex items-center gap-4">
                            <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>

                            <a href="{{ route('settings.account') }}" class="text-sm text-blue-600 hover:underline">
                                Profil
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-red-600 hover:underline">
                                    Wyloguj
                                </button>
                            </form>
                        </div>
                    </header>

                    <main class="flex-1 bg-[rgb(249_249_249/0.87)] backdrop-blur-[100px] p-8">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
