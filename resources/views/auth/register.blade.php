<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('auth.register') }} — {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center p-4"
         style="
            background:
                radial-gradient(circle at 22% 10%, rgba(242, 177, 154, 0.24) 0%, rgba(242,178,154,0) 40%),
                radial-gradient(circle at 8% 85%, rgba(169, 208, 144, 0.55) 0%, rgba(169, 208, 144, 0) 35%),
                radial-gradient(circle at 48% 92%, rgba(242, 177, 154, 0.19) 0%, rgba(242, 178, 154, 0) 38%),
                radial-gradient(circle at 92% 18%, rgba(175, 225, 240, 0.55) 0%, rgba(175, 225, 240, 0) 35%),
                linear-gradient(135deg, #f8f7f2 0%, #f7f6f3 100%);
         ">

        <div class="w-full max-w-md">

            {{-- Logo / Nagłówek --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/60 backdrop-blur-xl border border-white/70 shadow-sm mb-5">
                    <span class="text-2xl font-bold text-indigo-500">DP</span>
                </div>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Utwórz konto</h1>
                <p class="mt-2 text-sm text-slate-500">Dołącz do Dziennika Praktykanta</p>
            </div>

            {{-- Karta rejestracji --}}
            <div class="bg-white/50 backdrop-blur-xl rounded-2xl border border-white/70 shadow-[0_0_50px_-12px_rgba(0,0,0,0.08)] p-8">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Imię i nazwisko --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">
                            {{ __('auth.name') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                </svg>
                            </div>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{ old('name') }}"
                                   required autofocus autocomplete="name"
                                   placeholder="Jan Kowalski"
                                   class="block w-full pl-11 pr-4 py-3 rounded-xl
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email --}}
                    <div class="mt-5">
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">
                            {{ __('auth.email') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                </svg>
                            </div>
                            <input id="email"
                                   name="email"
                                   type="email"
                                   value="{{ old('email') }}"
                                   required autocomplete="username"
                                   placeholder="jan@example.com"
                                   class="block w-full pl-11 pr-4 py-3 rounded-xl
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Hasło --}}
                    <div class="mt-5">
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">
                            {{ __('auth.password') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                </svg>
                            </div>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   required autocomplete="new-password"
                                   placeholder="••••••••"
                                   class="block w-full pl-11 pr-4 py-3 rounded-xl
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Potwierdź hasło --}}
                    <div class="mt-5">
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1.5">
                            {{ __('auth.password_confirmation') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                                </svg>
                            </div>
                            <input id="password_confirmation"
                                   name="password_confirmation"
                                   type="password"
                                   required autocomplete="new-password"
                                   placeholder="••••••••"
                                   class="block w-full pl-11 pr-4 py-3 rounded-xl
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Przycisk --}}
                    <div class="mt-7">
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl
                                       bg-gradient-to-r from-indigo-500 to-indigo-600
                                       text-white font-semibold text-sm tracking-wide
                                       shadow-lg shadow-indigo-500/25
                                       hover:from-indigo-600 hover:to-indigo-700
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2
                                       active:scale-[0.98]
                                       transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>
                            </svg>
                            {{ __('auth.register') }}
                        </button>
                    </div>
                </form>
            </div>

            {{-- Link do logowania --}}
            <p class="text-center mt-6 text-sm text-slate-500">
                Masz już konto?
                <a href="{{ route('login') }}"
                   class="font-semibold text-indigo-500 hover:text-indigo-700 transition-colors">
                    {{ __('auth.already_registered') }}
                </a>
            </p>

            {{-- Stopka --}}
            <p class="text-center mt-8 text-xs text-slate-400">
                &copy; {{ date('Y') }} Dziennik Praktykanta
            </p>
        </div>
    </div>

</body>
</html>