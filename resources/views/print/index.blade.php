<x-app-layout>
    <x-slot name="header">
        Drukowanie
    </x-slot>

    <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-6 sm:p-8">
        <div class="flex flex-col items-center justify-center text-center py-12 sm:py-20">

            {{-- Ikona --}}
            <div class="relative mb-8">
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-amber-100/60 flex items-center justify-center">
                    <svg class="w-12 h-12 sm:w-14 sm:h-14 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z"/>
                    </svg>
                </div>

                {{-- Animowane kropki --}}
                <div class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-amber-400 animate-pulse"></div>
                <div class="absolute -bottom-1 -left-1 w-3 h-3 rounded-full bg-indigo-400 animate-pulse [animation-delay:0.5s]"></div>
            </div>

            {{-- Treść --}}
            <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-3">
                Strona w budowie
            </h3>
            <p class="text-sm sm:text-base text-slate-500 leading-relaxed max-w-md mb-2">
                Pracujemy nad funkcją generowania i drukowania raportów z dziennika praktyk.
            </p>
            <p class="text-xs sm:text-sm text-slate-400 mb-8">
                Wkrótce będziesz mógł eksportować swoje wpisy do PDF.
            </p>

            {{-- Pasek postępu --}}
            <div class="w-full max-w-xs mb-8">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold text-slate-500">Postęp prac</span>
                    <span class="text-xs font-bold text-amber-600">W trakcie</span>
                </div>
                <div class="w-full h-2.5 rounded-full bg-slate-200/60 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-amber-400 to-amber-500 w-[35%] animate-pulse"></div>
                </div>
            </div>

            {{-- Planowane funkcje --}}
            <div class="w-full max-w-sm space-y-2.5 mb-10">
                <div class="flex items-center gap-3 rounded-xl bg-green-50/50 border border-green-100/60 px-4 py-2.5 text-left">
                    <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <span class="text-sm text-green-700 font-medium">Zapis wpisów dziennych</span>
                </div>
                <div class="flex items-center gap-3 rounded-xl bg-green-50/50 border border-green-100/60 px-4 py-2.5 text-left">
                    <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <span class="text-sm text-green-700 font-medium">Dane szkoły i firmy</span>
                </div>
                <div class="flex items-center gap-3 rounded-xl bg-amber-50/50 border border-amber-100/60 px-4 py-2.5 text-left">
                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 animate-spin [animation-duration:3s]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182"/>
                    </svg>
                    <span class="text-sm text-amber-700 font-medium">Generowanie PDF</span>
                </div>
                <div class="flex items-center gap-3 rounded-xl bg-slate-50/50 border border-slate-200/60 px-4 py-2.5 text-left">
                    <div class="w-4 h-4 rounded-full border-2 border-slate-300 flex-shrink-0"></div>
                    <span class="text-sm text-slate-400 font-medium">Szablony wydruku</span>
                </div>
            </div>

            {{-- Przycisk powrotu --}}
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                Wróć do panelu
            </a>
        </div>
    </div>
</x-app-layout>