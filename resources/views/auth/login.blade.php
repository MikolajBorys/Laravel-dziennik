<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('auth.log_in') }} — {{ config('app.name', 'Laravel') }}</title>

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
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/60 backdrop-blur-xl border border-white/70 shadow-sm mb-5 ">
                    <span class="text-2xl font-bold text-indigo-500">DP</span>
                </a>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Dziennik Praktykanta</h1>
                <p class="mt-2 text-sm text-slate-500">Zaloguj się do swojego konta</p>
            </div>

            {{-- Karta logowania --}}
            <div class="bg-white/50 backdrop-blur-xl rounded-2xl border border-white/70 shadow-[0_0_50px_-12px_rgba(0,0,0,0.08)] p-8">

                {{-- Status sesji --}}
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div>
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
                                   required autofocus autocomplete="username"
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
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-semibold text-slate-700">
                                {{ __('auth.login_password') }}
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-xs font-medium text-indigo-500 hover:text-indigo-700 transition-colors">
                                    {{ __('auth.forgot_your_password') }}
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                </svg>
                            </div>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   required autocomplete="current-password"
                                   placeholder="••••••••"
                                   class="block w-full pl-11 pr-4 py-3 rounded-xl
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Zapamiętaj mnie --}}
                    <div class="mt-5">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="w-4 h-4 rounded-md border-slate-300 text-indigo-500
                                          focus:ring-indigo-500/40 focus:ring-offset-0
                                          transition duration-200" />
                            <span class="ml-2.5 text-sm text-slate-600 group-hover:text-slate-800 transition-colors">
                                {{ __('auth.remember_me') }}
                            </span>
                        </label>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/>
                            </svg>
                            {{ __('auth.log_in') }}
                        </button>
                    </div>
                </form>
            </div>

            {{-- Link do rejestracji --}}
            @if (Route::has('register'))
                <p class="text-center mt-6 text-sm text-slate-500">
                    Nie masz konta?
                    <a href="{{ route('register') }}"
                       class="font-semibold text-indigo-500 hover:text-indigo-700 transition-colors">
                        Zarejestruj się
                    </a>
                </p>
            @endif

            {{-- Stopka --}}
            <p class="text-center mt-8 text-xs text-slate-400">
                &copy; {{ date('Y') }} Dziennik Praktykanta
            </p>
        </div>
    </div>

</body>
</html>