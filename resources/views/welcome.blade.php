<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Dziennik Praktykanta') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800"
      style="
        background:
            radial-gradient(circle at 22% 10%, rgba(242, 177, 154, 0.24) 0%, rgba(242,178,154,0) 40%),
            radial-gradient(circle at 8% 85%, rgba(169, 208, 144, 0.55) 0%, rgba(169, 208, 144, 0) 35%),
            radial-gradient(circle at 48% 92%, rgba(242, 177, 154, 0.19) 0%, rgba(242, 178, 154, 0) 38%),
            radial-gradient(circle at 92% 18%, rgba(175, 225, 240, 0.55) 0%, rgba(175, 225, 240, 0) 35%),
            linear-gradient(135deg, #f8f7f2 0%, #f7f6f3 100%);
      ">

    <nav class="fixed top-0 inset-x-0 z-50 bg-white/60 backdrop-blur-xl border-b border-white/70">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center sm:justify-between justify-end">
            <a href="/" class="items-center gap-3 hidden sm:flex">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white text-sm font-bold shadow-md">
                    DP
                </div>
                <span class="text-lg font-bold text-slate-800 tracking-tight">Dziennik Praktykanta</span>
            </a>

            @if (Route::has('login'))
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 transition-all">
                            Przejdź do panelu
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="rounded-xl px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-indigo-600 hover:bg-white/60 transition-all">
                            Zaloguj się
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 transition-all">
                                Utwórz konto
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>


    <section class="relative pt-40 pb-24 px-6 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-indigo-200/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50/60 border border-indigo-100/60 text-sm font-medium text-indigo-600 mb-8">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 0 0-2.455 2.456Z"/></svg>
                Koniec z papierowym dziennikiem!
            </div>

            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 leading-[1.1]">
                Twój dziennik praktyk
                <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600 bg-clip-text text-transparent">
                    w wersji cyfrowej
                </span>
            </h1>

            <p class="mt-8 text-lg sm:text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Zapomnij o zeszycie i długopisie. Prowadź dzienniczek praktyk zawodowych online — szybko, wygodnie i bez stresu, że coś zgubisz.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-8 py-4 text-base font-bold text-white shadow-xl shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                        Przejdź do panelu
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                @else
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-8 py-4 text-base font-bold text-white shadow-xl shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                        Zacznij za darmo
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a href="#funkcje"
                       class="inline-flex items-center gap-2 rounded-2xl bg-white/60 backdrop-blur-md border border-white/70 px-8 py-4 text-base font-semibold text-slate-700 shadow-sm hover:bg-white/80 transition-all">
                        Dowiedz się więcej
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"/></svg>
                    </a>
                @endauth
            </div>

            <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-8 sm:gap-14">
                <div class="text-center flex-1">
                    <p class="text-3xl font-extrabold text-slate-800">30s</p>
                    <p class="text-sm text-slate-500 mt-1">by dodać wpis</p>
                </div>
                <div class="hidden sm:block w-px h-10 bg-slate-200/80"></div>
                <div class="text-center flex-1 mt-8 sm:mt-0">
                    <p class="text-3xl font-extrabold text-slate-800">0 zł</p>
                    <p class="text-sm text-slate-500 mt-1">całkowicie darmowe</p>
                </div>
                <div class="hidden sm:block w-px h-10 bg-slate-200/80"></div>
                <div class="text-center flex-1 mt-8 sm:mt-0">
                    <p class="text-3xl font-extrabold text-slate-800">24/7</p>
                    <p class="text-sm text-slate-500 mt-1">dostęp z każdego urządzenia</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Papierowy dziennik vs. Dziennik Praktykanta
                </h2>
                <p class="mt-4 text-lg text-slate-500 max-w-2xl mx-auto">
                    Każdy praktykant zna te problemy. Pora je rozwiązać.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-red-50/40 backdrop-blur-md rounded-2xl border border-red-200/40 p-8 space-y-5">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-red-100/60 text-sm font-semibold text-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/></svg>
                        Papierowy dziennik
                    </div>

                    @php
                        $problems = [
                            'Ciągłe noszenie zeszytu ze sobą',
                            'Brzydki, nieczytelny charakter pisma',
                            'Pomyłka = przekreślenie i bałagan',
                            'Łatwo go zgubić lub zniszczyć',
                            'Ręczne liczenie godzin i dni',
                            'Brak kopii zapasowej',
                            'Trudno coś poprawić po czasie',
                        ];
                    @endphp

                    @foreach($problems as $problem)
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18 18 6M6 6l12 12"/></svg>
                            </div>
                            <p class="text-sm text-red-800/80">{{ $problem }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="bg-green-50/40 backdrop-blur-md rounded-2xl border border-green-200/40 p-8 space-y-5">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-100/60 text-sm font-semibold text-green-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        Dziennik Praktykanta
                    </div>

                    @php
                        $solutions = [
                            'Dostęp z telefonu, tabletu i komputera',
                            'Zawsze czytelne, schludne wpisy',
                            'Edytuj dowolny wpis w dowolnym momencie',
                            'Dane bezpiecznie w chmurze',
                            'Automatyczne statystyki i podsumowania',
                            'Konto chronione hasłem',
                            'Szybka edycja — poprawki w kilka sekund',
                        ];
                    @endphp

                    @foreach($solutions as $solution)
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            </div>
                            <p class="text-sm text-green-800/80">{{ $solution }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section id="funkcje" class="py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50/60 border border-indigo-100/60 text-sm font-medium text-indigo-600 mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                    Wszystko czego potrzebujesz
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Funkcje, które ułatwią Ci życie
                </h2>
                <p class="mt-4 text-lg text-slate-500 max-w-2xl mx-auto">
                    Zaprojektowane z myślą o uczniach technikum na praktykach zawodowych.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="group bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-7 hover:shadow-md hover:bg-white/70 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-indigo-100/60 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Szybkie wpisy</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Dodaj wpis w 30 sekund. Data uzupełnia się automatycznie — Ty wpisujesz tylko co robiłeś i ile godzin.
                    </p>
                </div>

                <div class="group bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-7 hover:shadow-md hover:bg-white/70 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-purple-100/60 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Edycja w dowolnym momencie</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Pomyłka? Żaden problem. Popraw dowolny wpis bez przekreśleń i korektora.
                    </p>
                </div>

                <div class="group bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-7 hover:shadow-md hover:bg-white/70 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-amber-100/60 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Automatyczne statystyki</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Liczba wpisów, dni praktyk, suma godzin — wszystko liczy się samo. Zero ręcznego sumowania.
                    </p>
                </div>

                <div class="group bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-7 hover:shadow-md hover:bg-white/70 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-green-100/60 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 21h19.5M3.75 3v18m4.5-18v18M15 3v18m4.5-18v18M6 6.75h.008M6 9.75h.008M6 12.75h.008M6 15.75h.008M17.25 6.75h.008M17.25 9.75h.008M17.25 12.75h.008M17.25 15.75h.008M9.75 21V18a2.25 2.25 0 0 1 2.25-2.25h0A2.25 2.25 0 0 1 14.25 18v3"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Dane szkoły i firmy</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Wpisz raz dane szkoły, firmy i opiekunów — automatycznie trafią na stronę tytułową dziennika.
                    </p>
                </div>

                <div class="group bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-7 hover:shadow-md hover:bg-white/70 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-rose-100/60 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M9.75 8.25h4.5"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Drukowanie</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Gotowy do oddania? Wydrukuj cały dziennik w schludnym formacie — prosto z przeglądarki.
                    </p>
                </div>

                <div class="group bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-7 hover:shadow-md hover:bg-white/70 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-sky-100/60 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Bezpieczne dane</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Konto chronione hasłem. Nie zgubisz danych — nawet jeśli zgubisz plecak z zeszytem.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-24 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    3 kroki i gotowe
                </h2>
                <p class="mt-4 text-lg text-slate-500">
                    Cały proces zajmuje mniej niż minutę.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Krok 1 --}}
                <div class="relative text-center">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white text-xl font-extrabold shadow-lg shadow-indigo-500/25 mb-5">
                        1
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Utwórz konto</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Podaj imię, email i hasło. Rejestracja trwa 15 sekund.
                    </p>
                </div>

                {{-- Krok 2 --}}
                <div class="relative text-center">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white text-xl font-extrabold shadow-lg shadow-indigo-500/25 mb-5">
                        2
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Uzupełnij dane</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Wpisz dane swojej szkoły i firmy, w której odbywasz praktyki.
                    </p>
                </div>

                {{-- Krok 3 --}}
                <div class="relative text-center">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white text-xl font-extrabold shadow-lg shadow-indigo-500/25 mb-5">
                        3
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Dodawaj wpisy</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Codziennie wpisuj co robiłeś i ile godzin. Reszta dzieje się sama.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white/50 backdrop-blur-xl rounded-3xl border border-white/70 shadow-sm p-10 sm:p-14">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        Dlaczego warto przejść na wersję cyfrową?
                    </h2>
                </div>

                <div class="grid sm:grid-cols-2 gap-x-12 gap-y-8">
                    @php
                        $reasons = [
                            ['icon' => '⏱️', 'title' => 'Oszczędność czasu', 'desc' => 'Wpisanie dnia w aplikacji trwa 30 sekund. W zeszycie — kilka minut pisania ręcznego.'],
                            ['icon' => '📱', 'title' => 'Zawsze przy sobie', 'desc' => 'Telefon masz zawsze. Zeszyt — nie zawsze. Dodaj wpis z dowolnego miejsca.'],
                            ['icon' => '✏️', 'title' => 'Czytelność', 'desc' => 'Koniec z "nie mogę odczytać co tu napisałeś". Tekst jest zawsze wyraźny.'],
                            ['icon' => '📊', 'title' => 'Automatyczne obliczenia', 'desc' => 'Godziny, dni, postęp — aplikacja liczy wszystko za Ciebie.'],
                            ['icon' => '🔒', 'title' => 'Nie zgubisz', 'desc' => 'Zeszyt można zostawić w autobusie. Konto online jest bezpieczne.'],
                            ['icon' => '🖨️', 'title' => 'Gotowy wydruk', 'desc' => 'Na koniec praktyk drukujesz schludny dokument. Nauczyciel będzie pod wrażeniem.'],
                            ['icon' => '🌿', 'title' => 'Ekologia', 'desc' => 'Mniej papieru = lepiej dla planety. Mały gest, duże znaczenie.'],
                            ['icon' => '😌', 'title' => 'Zero stresu', 'desc' => 'Nie musisz się martwić, że zapomniałeś dziennika w domu przed oddaniem.'],
                        ];
                    @endphp

                    @foreach($reasons as $reason)
                        <div class="flex items-start gap-4">
                            <span class="text-2xl mt-0.5">{{ $reason['icon'] }}</span>
                            <div>
                                <h4 class="font-bold text-slate-800">{{ $reason['title'] }}</h4>
                                <p class="text-sm text-slate-500 mt-1 leading-relaxed">{{ $reason['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="py-24 px-6" x-data="{ open: null }">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Najczęstsze pytania
                </h2>
                <p class="mt-4 text-lg text-slate-500">
                    Wszystko co chcesz wiedzieć przed rejestracją.
                </p>
            </div>

            @php
                $faqs = [
                    ['q' => 'Czy to jest darmowe?', 'a' => 'Tak! Aplikacja jest całkowicie darmowa. Nie ma żadnych ukrytych opłat ani limitów.'],
                    ['q' => 'Czy mogę używać tego na telefonie?', 'a' => 'Oczywiście. Aplikacja działa w przeglądarce na każdym urządzeniu — telefonie, tablecie i komputerze.'],
                    ['q' => 'Czy nauczyciel zaakceptuje wydruk z aplikacji?', 'a' => 'Wydruk zawiera wszystkie informacje wymagane w dzienniku praktyk — dane szkoły, firmy, wpisy dzienne z datami i godzinami.'],
                    ['q' => 'Co jeśli zapomnę dodać wpis któregoś dnia?', 'a' => 'Możesz dodać lub edytować wpis z dowolną datą w dowolnym momencie. Nic nie przepadnie.'],
                    ['q' => 'Czy moje dane są bezpieczne?', 'a' => 'Tak. Twoje konto jest chronione hasłem, a dane są przechowywane na zabezpieczonym serwerze.'],
                    ['q' => 'Dla kogo jest ta aplikacja?', 'a' => 'Głównie dla uczniów technikum odbywających praktyki zawodowe (klasa 3 lub 4), ale może z niej korzystać każdy praktykant.'],
                ];
            @endphp

            <div class="space-y-3">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm overflow-hidden">
                        <button
                            @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                            class="w-full flex items-center justify-between px-7 py-5 text-left"
                        >
                            <span class="text-[15px] font-bold text-slate-800">{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform duration-200"
                                 :class="open === {{ $index }} && 'rotate-180'"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>
                        <div x-show="open === {{ $index }}"
                             x-transition:enter="transition-all ease-out duration-200"
                             x-transition:enter-start="opacity-0 max-h-0"
                             x-transition:enter-end="opacity-100 max-h-40"
                             x-transition:leave="transition-all ease-in duration-150"
                             x-transition:leave-start="opacity-100 max-h-40"
                             x-transition:leave-end="opacity-0 max-h-0"
                             class="overflow-hidden">
                            <div class="px-7 pb-5">
                                <p class="text-sm text-slate-500 leading-relaxed">{{ $faq['a'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-24 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-12 sm:p-16 shadow-2xl shadow-indigo-500/20 relative overflow-hidden">
                {{-- Dekoracja --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-2xl"></div>

                <div class="relative">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                        Gotowy, żeby porzucić zeszyt?
                    </h2>
                    <p class="mt-4 text-lg text-indigo-100 max-w-xl mx-auto">
                        Dołącz do Dziennika Praktykanta i zacznij prowadzić praktyki cyfrowo. Rejestracja zajmie Ci 15 sekund.
                    </p>

                    @guest
                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center gap-2 rounded-2xl bg-white px-8 py-4 text-base font-bold text-indigo-600 shadow-lg hover:bg-indigo-50 active:scale-[0.98] transition-all">
                                Utwórz darmowe konto
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                            </a>
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center gap-2 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 px-8 py-4 text-base font-semibold text-white hover:bg-white/30 transition-all">
                                Mam już konto
                            </a>
                        </div>
                    @else
                        <div class="mt-10">
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex items-center gap-2 rounded-2xl bg-white px-8 py-4 text-base font-bold text-indigo-600 shadow-lg hover:bg-indigo-50 active:scale-[0.98] transition-all">
                                Przejdź do panelu
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <footer class="py-10 px-6 border-t border-slate-200/50">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-500 text-white text-xs font-bold">
                    DP
                </div>
                <span class="text-sm font-semibold text-slate-600">Dziennik Praktykanta</span>
            </div>
            <p class="text-sm text-slate-400">
                &copy; {{ date('Y') }} Dziennik Praktykanta. Stworzone dla praktykantów.
            </p>
        </div>
    </footer>

</body>
</html>