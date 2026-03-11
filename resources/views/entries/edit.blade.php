<x-app-layout>
    <x-slot name="header">
        Edytuj wpis
    </x-slot>

    <div class="space-y-6">

        {{-- Błędy --}}
        @if ($errors->any())
            <div class="flex items-center gap-3 rounded-xl border border-red-200/60 bg-red-50/50 backdrop-blur-md px-5 py-4 text-red-700">
                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                </svg>
                <span class="text-sm font-medium">Popraw zaznaczone pola i spróbuj ponownie.</span>
            </div>
        @endif

        {{-- Karta formularza --}}
        <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-8">

            {{-- Nagłówek --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 rounded-xl bg-amber-100/60 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-800">Edycja wpisu dziennego</h3>
                    <p class="text-sm text-slate-500 mt-0.5">
                        Wpis z dnia
                        <span class="font-semibold text-slate-600">
                            {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('j F Y') }}
                        </span>
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('entries.update', $entry->id) }}">
                @csrf
                @method('PUT')

                <div class="space-y-6">

                    {{-- Sekcja: Data --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="entry_date" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                Data
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                    </svg>
                                </div>
                                <input type="date"
                                       id="entry_date"
                                       name="entry_date"
                                       value="{{ old('entry_date', $entry->entry_date) }}"
                                       class="block w-full pl-11 pr-4 py-3 rounded-xl
                                              bg-white/60 border border-slate-200/80
                                              text-slate-800
                                              focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                              transition duration-200" />
                            </div>
                            @error('entry_date')
                                <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Separator --}}
                    <div class="border-t border-slate-200/50"></div>

                    {{-- Sekcja: Godziny --}}
                    <div>
                        <p class="text-xs uppercase tracking-wider text-slate-400 font-semibold mb-4">Godziny pracy</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="time_from" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Od
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="time"
                                           id="time_from"
                                           name="time_from"
                                           value="{{ old('time_from', $entry->time_from) }}"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl
                                                  bg-white/60 border border-slate-200/80
                                                  text-slate-800
                                                  focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                                  transition duration-200" />
                                </div>
                                @error('time_from')
                                    <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="time_to" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Do
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="time"
                                           id="time_to"
                                           name="time_to"
                                           value="{{ old('time_to', $entry->time_to) }}"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl
                                                  bg-white/60 border border-slate-200/80
                                                  text-slate-800
                                                  focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                                  transition duration-200" />
                                </div>
                                @error('time_to')
                                    <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Separator --}}
                    <div class="border-t border-slate-200/50"></div>

                    {{-- Sekcja: Treść --}}
                    <div>
                        <p class="text-xs uppercase tracking-wider text-slate-400 font-semibold mb-4">Opis dnia</p>
                        <div class="space-y-6">
                            <div>
                                <label for="tasks" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Wykonane zadania
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3.5 left-3.5 pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                        </svg>
                                    </div>
                                    <textarea id="tasks"
                                              name="tasks"
                                              rows="5"
                                              placeholder="Opisz czym zajmowałeś/aś się tego dnia..."
                                              class="block w-full pl-11 pr-4 py-3 rounded-xl
                                                     bg-white/60 border border-slate-200/80
                                                     text-slate-800 placeholder-slate-400
                                                     focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                                     transition duration-200 resize-y">{{ old('tasks', $entry->tasks) }}</textarea>
                                </div>
                                @error('tasks')
                                    <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Notatki
                                    <span class="text-xs font-normal text-slate-400 ml-1">(opcjonalne)</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3.5 left-3.5 pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>
                                        </svg>
                                    </div>
                                    <textarea id="notes"
                                              name="notes"
                                              rows="3"
                                              placeholder="Dodatkowe uwagi, spostrzeżenia..."
                                              class="block w-full pl-11 pr-4 py-3 rounded-xl
                                                     bg-white/60 border border-slate-200/80
                                                     text-slate-800 placeholder-slate-400
                                                     focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                                     transition duration-200 resize-y">{{ old('notes', $entry->notes) }}</textarea>
                                </div>
                                @error('notes')
                                    <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Separator --}}
                <div class="border-t border-slate-200/50 mt-8 mb-6"></div>

                {{-- Przyciski --}}
                <div class="flex items-center justify-between">
                    <a href="{{ route('entries.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-white/60 border border-slate-200/80 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-white/80 hover:text-slate-800 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                        </svg>
                        Wróć
                    </a>

                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                        Zapisz zmiany
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>