<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('auth.forgot_your_password') }} — {{ config('app.name', 'Laravel') }}</title>

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
                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Resetuj hasło</h1>
                <p class="mt-2 text-sm text-slate-500">Wyślemy Ci link do zmiany hasła</p>
            </div>

            {{-- Karta --}}
            <div class="bg-white/50 backdrop-blur-xl rounded-2xl border border-white/70 shadow-[0_0_50px_-12px_rgba(0,0,0,0.08)] p-8">

                {{-- Instrukcja --}}
                <div class="flex items-start gap-3 p-4 rounded-xl bg-indigo-50/50 border border-indigo-100/60 mb-6">
                    <svg class="w-5 h-5 text-indigo-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                    </svg>
                    <p class="text-sm text-indigo-700/80 leading-relaxed">
                        {{ __('auth.forgot_your_password_instructions') }}
                    </p>
                </div>

                {{-- Status sesji (np. "Link wysłany!") --}}
                @if (session('status'))
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-green-50/50 border border-green-200/60 mb-6">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <p class="text-sm text-green-700 font-medium">{{ session('status') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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
                                   required autofocus
                                   placeholder="jan@example.com"
                                   class="block w-full pl-11 pr-4 py-3 rounded-xl
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.953 5.576a2.25 2.25 0 0 1-2.594 0L2.25 6.75"/>
                            </svg>
                            {{ __('auth.email_password_reset_link') }}
                        </button>
                    </div>
                </form>
            </div>

            {{-- Powrót do logowania --}}
            <div class="text-center mt-6">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-indigo-500 hover:text-indigo-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                    Wróć do logowania
                </a>
            </div>

            {{-- Stopka --}}
            <p class="text-center mt-8 text-xs text-slate-400">
                &copy; {{ date('Y') }} Dziennik Praktykanta
            </p>
        </div>
    </div>

</body>
</html>