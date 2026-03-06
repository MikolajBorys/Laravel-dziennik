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
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex">
            <aside class="w-64 bg-slate-900 text-white flex flex-col">
                <div class="px-6 py-5 border-b border-slate-700">
                    <h1 class="text-xl font-bold">Dziennik Praktykanta</h1>
                    <p class="text-sm text-slate-300 mt-1">Panel użytkownika</p>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-6">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-slate-400 mb-3">Dziennik</p>
                        <div class="space-y-2">
                            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
                                Dashboard
                            </a>
                            <a href="{{ route('entries.index') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
                                Wpisy
                            </a>
                            <a href="{{ route('print.index') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
                                Drukowanie
                            </a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-wider text-slate-400 mb-3">Ustawienia</p>
                        <div class="space-y-2">
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-800">
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

                        <a href="{{ route('profile.edit') }}" class="text-sm text-blue-600 hover:underline">
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

                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
