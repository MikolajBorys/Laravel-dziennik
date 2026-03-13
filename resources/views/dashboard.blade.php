<x-app-layout>
    <x-slot name="header">
        Panel główny
    </x-slot>

    <div class="space-y-4 sm:space-y-6">

        {{-- Powitanie --}}
        <div class="bg-white/50 backdrop-blur-md rounded-xl p-4 sm:p-6 border border-white/70 shadow-sm">
            <h3 class="text-lg sm:text-xl font-semibold text-slate-800 mb-1 sm:mb-2">
                👋 Witaj, {{ Auth::user()->name }}!
            </h3>
            <p class="text-sm sm:text-base text-slate-600">
                To jest panel główny aplikacji <strong class="text-indigo-600">Dziennik Praktykanta</strong>. Zarządzaj swoimi praktykami w jednym miejscu.
            </p>
        </div>

        {{-- Statystyki --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-6">
            {{-- Wpisy --}}
            <div class="bg-white/50 backdrop-blur-md rounded-xl p-4 sm:p-6 border border-white/70 shadow-sm">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div class="flex-shrink-0 p-2.5 sm:p-3 bg-indigo-100/60 rounded-lg w-fit">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-slate-500">Wpisy</p>
                        <p class="text-xl sm:text-2xl font-bold text-slate-800">{{ $entriesCount }}</p>
                    </div>
                </div>
            </div>

            {{-- Dni praktyk --}}
            <div class="bg-white/50 backdrop-blur-md rounded-xl p-4 sm:p-6 border border-white/70 shadow-sm">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div class="flex-shrink-0 p-2.5 sm:p-3 bg-purple-100/60 rounded-lg w-fit">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-slate-500">Dni praktyk</p>
                        <p class="text-xl sm:text-2xl font-bold text-slate-800">{{ $daysCount }}</p>
                    </div>
                </div>
            </div>

            {{-- Godziny --}}
            <div class="col-span-2 sm:col-span-1 bg-white/50 backdrop-blur-md rounded-xl p-4 sm:p-6 border border-white/70 shadow-sm">
                <div class="flex flex-row items-center gap-3">
                    <div class="flex-shrink-0 p-2.5 sm:p-3 bg-amber-100/60 rounded-lg w-fit">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-slate-500">Suma godzin</p>
                        <p class="text-xl sm:text-2xl font-bold text-slate-800">{{ $totalHours }}h {{ $remainingMinutes }}m</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Szybkie akcje i ostatnia aktywność --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">

            {{-- Szybkie akcje --}}
            <div class="bg-white/50 backdrop-blur-md rounded-xl p-4 sm:p-6 border border-white/70 shadow-sm">
                <h4 class="text-base sm:text-lg font-semibold text-slate-800 mb-3 sm:mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 sm:w-6 sm:h-6 mr-2 text-amber-500">
                        <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                    </svg>
                    Szybkie akcje
                </h4>
                <div class="space-y-2 sm:space-y-3">
                    <a href="{{ route('entries.create') }}" class="flex items-center p-2.5 sm:p-3 rounded-lg bg-indigo-50/50 border border-indigo-100/60 hover:bg-indigo-100/60 transition-colors group">
                        <svg class="w-5 h-5 text-indigo-600 mr-2.5 sm:mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="text-sm font-medium text-indigo-700 group-hover:text-indigo-800">Dodaj nowy wpis</span>
                    </a>
                    <a href="{{ route('entries.index') }}" class="flex items-center p-2.5 sm:p-3 rounded-lg bg-green-50/50 border border-green-100/60 hover:bg-green-100/60 transition-colors group">
                        <svg class="w-5 h-5 text-green-600 mr-2.5 sm:mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm font-medium text-green-700 group-hover:text-green-800">Przeglądaj wpisy</span>
                    </a>
                    <a href="{{ route('settings.account') }}" class="flex items-center p-2.5 sm:p-3 rounded-lg bg-purple-50/50 border border-purple-100/60 hover:bg-purple-100/60 transition-colors group">
                        <svg class="w-5 h-5 text-purple-600 mr-2.5 sm:mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm font-medium text-purple-700 group-hover:text-purple-800">Ustawienia konta</span>
                    </a>
                </div>
            </div>

            {{-- Ostatnia aktywność --}}
            <div class="bg-white/50 backdrop-blur-md rounded-xl p-4 sm:p-6 border border-white/70 shadow-sm">
                <h4 class="text-base sm:text-lg font-semibold text-slate-800 mb-3 sm:mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 sm:w-6 sm:h-6 mr-2 text-indigo-400">
                        <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
                    </svg>
                    Ostatnia aktywność
                </h4>

                @if($latestEntries->isEmpty())
                    <div class="flex items-center justify-center h-32">
                        <div class="text-center">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-xs sm:text-sm text-slate-500">Brak wpisów. Dodaj pierwszy wpis do dziennika!</p>
                        </div>
                    </div>
                @else
                    <div class="space-y-2 sm:space-y-3">
                        @foreach($latestEntries as $entry)
                            <a href="{{ route('entries.edit', $entry->id) }}"
                               class="flex flex-col sm:flex-row sm:items-start sm:justify-between rounded-lg bg-white/40 px-3 sm:px-4 py-2.5 sm:py-3 hover:bg-white/60 transition-colors group gap-2 sm:gap-0">

                                <div class="flex items-start gap-2.5 sm:gap-3 min-w-0">
                                    <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-indigo-100/60 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="text-[10px] sm:text-xs font-bold text-indigo-600">
                                            {{ \Carbon\Carbon::parse($entry->entry_date)->format('d') }}
                                        </span>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-medium text-slate-700 group-hover:text-indigo-600 transition-colors truncate">
                                            {{-- Mobile: krótszy format, Desktop: pełny --}}
                                            <span class="sm:hidden">
                                                {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('l, j M') }}
                                            </span>
                                            <span class="hidden sm:inline">
                                                {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('l, j F Y') }}
                                            </span>
                                        </p>
                                        <p class="text-xs text-slate-500 mt-0.5 sm:mt-1 leading-relaxed line-clamp-1 sm:line-clamp-2">
                                            {{ \Illuminate\Support\Str::limit($entry->tasks, 60) }}
                                        </p>
                                    </div>
                                </div>

                                <span class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-medium text-slate-400 bg-white/50 px-2 py-0.5 sm:py-1 rounded-md whitespace-nowrap w-fit sm:ml-4 sm:mt-0.5 ml-[2.625rem]">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($entry->time_from)->format('H:i') }} — {{ \Carbon\Carbon::parse($entry->time_to)->format('H:i') }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>