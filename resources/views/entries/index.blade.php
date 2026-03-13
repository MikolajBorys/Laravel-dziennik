<x-app-layout>
    <x-slot name="header">
        Wpisy
    </x-slot>

    <div class="space-y-6"
         x-data="{
            deleteModal: false,
            deleteUrl: '',
            deleteDate: '',
            filtersOpen: {{ request()->hasAny(['date_from', 'date_to', 'sort']) ? 'true' : 'false' }},
            openDelete(url, date) {
                this.deleteUrl = url;
                this.deleteDate = date;
                this.deleteModal = true;
            }
         }">

        <template x-teleport="body">
            <div x-show="deleteModal"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 flex items-center justify-center p-4"
                 @keydown.escape.window="deleteModal = false"
                 style="display: none;">

                <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm"
                     @click="deleteModal = false"></div>

                <div x-show="deleteModal"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                     class="relative w-full max-w-md bg-white/80 backdrop-blur-xl rounded-2xl border border-white/70 shadow-2xl p-8">

                    <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-red-100/60 mx-auto mb-5">
                        <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                        </svg>
                    </div>

                    <div class="text-center mb-8">
                        <h3 class="text-lg font-bold text-slate-800 mb-2">Usunąć wpis?</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Czy na pewno chcesz usunąć wpis z dnia
                            <span class="font-semibold text-slate-700" x-text="deleteDate"></span>?
                            <br>Tej operacji nie można cofnąć.
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <button @click="deleteModal = false"
                                class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-white/60 border border-slate-200/80 px-5 py-3 text-sm font-semibold text-slate-600 hover:bg-white/80 hover:text-slate-800 transition-all">
                            Anuluj
                        </button>

                        <form :action="deleteUrl" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/25 hover:from-red-600 hover:to-red-700 active:scale-[0.98] transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79"/>
                                </svg>
                                Usuń wpis
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </template>


        @if (session('success'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                x-transition
                class="flex items-center gap-3 rounded-xl border border-green-200/60 bg-green-50/50 backdrop-blur-md px-5 py-4 text-green-700 !mb-6"
            >
                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="flex items-center gap-3 rounded-xl border border-red-200/60 bg-red-50/50 backdrop-blur-md px-5 py-4 text-red-700">
                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                </svg>
                <span class="text-sm font-medium">Wystąpiły błędy. Sprawdź formularz i spróbuj ponownie.</span>
            </div>
        @endif

        <div class="flex items-center justify-between !mt-0">
            <div>
                <h3 class="text-xl font-bold text-slate-800 hidden sm:block">Dziennik praktyk</h3>
                <p class="text-sm text-slate-500 mt-1 hidden sm:block">
                    Tutaj znajdziesz swoje wpisy dzienne z praktyk.
                </p>
            </div>

            <div class="flex items-center gap-3">
                {{-- Przycisk filtrów --}}
                <button @click="filtersOpen = !filtersOpen"
                        class="inline-flex items-center gap-2 rounded-xl bg-white/60 border border-slate-200/80 px-4 py-2.5 text-sm font-semibold transition-all"
                        :class="filtersOpen ? 'text-indigo-600 border-indigo-200/80 bg-indigo-50/40' : 'text-slate-600 hover:bg-white/80 hover:text-slate-800'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"/>
                    </svg>
                    Filtry
                    @if(request()->hasAny(['date_from', 'date_to', 'sort']))
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    @endif
                </button>

                <a href="{{ route('entries.create') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Dodaj wpis
                </a>
            </div>
        </div>

        <div x-show="filtersOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             x-cloak>

            <form method="GET" action="{{ route('entries.index') }}"
                  class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-6">

                <div class="flex items-center gap-3 mb-5">
                    <div class="w-8 h-8 rounded-lg bg-indigo-100/60 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Filtrowanie i sortowanie</h4>
                        <p class="text-xs text-slate-500">Zawęź wyniki po zakresie dat lub zmień kolejność.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    {{-- Data od --}}
                    <div>
                        <label for="date_from" class="block text-xs font-semibold text-slate-600 mb-1.5">Data od</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                            </div>
                            <input type="date"
                                   id="date_from"
                                   name="date_from"
                                   value="{{ request('date_from') }}"
                                   class="block w-full pl-10 pr-3 py-2.5 rounded-xl text-sm
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                    </div>

                    {{-- Data do --}}
                    <div>
                        <label for="date_to" class="block text-xs font-semibold text-slate-600 mb-1.5">Data do</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                            </div>
                            <input type="date"
                                   id="date_to"
                                   name="date_to"
                                   value="{{ request('date_to') }}"
                                   class="block w-full pl-10 pr-3 py-2.5 rounded-xl text-sm
                                          bg-white/60 border border-slate-200/80
                                          text-slate-800
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                          transition duration-200" />
                        </div>
                    </div>

                    {{-- Sortowanie --}}
                    <div>
                        <label for="sort" class="block text-xs font-semibold text-slate-600 mb-1.5">Sortowanie</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5"/>
                                </svg>
                            </div>
                            <select id="sort"
                                    name="sort"
                                    class="block w-full pl-10 pr-8 py-2.5 rounded-xl text-sm appearance-none
                                           bg-white/60 border border-slate-200/80
                                           text-slate-800
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400
                                           transition duration-200">
                                <option value="desc" {{ request('sort', 'desc') === 'desc' ? 'selected' : '' }}>
                                    Najnowsze najpierw
                                </option>
                                <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>
                                    Najstarsze najpierw
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Przyciski --}}
                <div class="flex items-center justify-between mt-5 pt-5 border-t border-slate-200/50">
                    @if(request()->hasAny(['date_from', 'date_to', 'sort']))
                        <a href="{{ route('entries.index') }}"
                           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 hover:text-red-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                            Wyczyść filtry
                        </a>
                    @else
                        <div></div>
                    @endif

                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                        Zastosuj
                    </button>
                </div>
            </form>
        </div>

        {{-- Aktywne filtry (badge'e) --}}
        @if(request()->hasAny(['date_from', 'date_to', 'sort']))
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs font-medium text-slate-400">Aktywne filtry:</span>

                @if(request('date_from'))
                    <span class="inline-flex items-center gap-1 rounded-lg bg-indigo-50/60 border border-indigo-100/60 px-2.5 py-1 text-xs font-medium text-indigo-600">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25"/>
                        </svg>
                        Od: {{ \Carbon\Carbon::parse(request('date_from'))->translatedFormat('j M Y') }}
                    </span>
                @endif

                @if(request('date_to'))
                    <span class="inline-flex items-center gap-1 rounded-lg bg-indigo-50/60 border border-indigo-100/60 px-2.5 py-1 text-xs font-medium text-indigo-600">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25"/>
                        </svg>
                        Do: {{ \Carbon\Carbon::parse(request('date_to'))->translatedFormat('j M Y') }}
                    </span>
                @endif

                @if(request('sort') === 'asc')
                    <span class="inline-flex items-center gap-1 rounded-lg bg-amber-50/60 border border-amber-100/60 px-2.5 py-1 text-xs font-medium text-amber-600">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5"/>
                        </svg>
                        Najstarsze najpierw
                    </span>
                @endif

                <a href="{{ route('entries.index') }}"
                   class="inline-flex items-center gap-1 rounded-lg px-2 py-1 text-xs font-medium text-slate-400 hover:text-red-500 transition-colors"
                   title="Wyczyść filtry">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </a>
            </div>
        @endif

        <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm overflow-hidden">

            {{-- Desktop: tabela --}}
            <div class="hidden sm:block">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b border-slate-200/60">
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Data</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Godziny</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Zadania</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400 text-right">Akcje</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100/80">

                        @forelse ($entries as $entry)
                            <tr class="group hover:bg-white/40 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-indigo-100/60 flex items-center justify-center flex-shrink-0">
                                            <span class="text-xs font-bold text-indigo-600">
                                                {{ \Carbon\Carbon::parse($entry->entry_date)->format('d') }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-slate-700">
                                                {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('l') }}
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('j F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 text-sm text-slate-600">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($entry->time_from)->format('H:i') }} - {{ \Carbon\Carbon::parse($entry->time_to)->format('H:i') }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-600 leading-relaxed max-w-md">
                                        {{ Str::limit($entry->tasks, 80) }}
                                    </p>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('entries.edit', $entry->id) }}"
                                           class="inline-flex items-center gap-1.5 rounded-lg bg-indigo-50/60 px-3 py-1.5 text-xs font-semibold text-indigo-600 hover:bg-indigo-100/60 transition-colors"
                                           title="Edytuj wpis">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/>
                                            </svg>
                                            Edytuj
                                        </a>

                                        <button @click="openDelete('{{ route('entries.destroy', $entry->id) }}', '{{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('j F Y') }}')"
                                                class="inline-flex items-center gap-1.5 rounded-lg bg-red-50/60 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100/60 transition-colors"
                                                title="Usuń wpis">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                            Usuń
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16">
                                    <div class="flex flex-col items-center justify-center text-center">
                                        <div class="w-16 h-16 rounded-2xl bg-slate-100/60 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                            </svg>
                                        </div>
                                        @if(request()->hasAny(['date_from', 'date_to']))
                                            <h4 class="text-base font-bold text-slate-700 mb-1">Brak wyników</h4>
                                            <p class="text-sm text-slate-500 mb-5">Nie znaleziono wpisów dla wybranego zakresu dat.</p>
                                            <a href="{{ route('entries.index') }}"
                                               class="inline-flex items-center gap-2 rounded-xl bg-white/60 border border-slate-200/80 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-white/80 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                                Wyczyść filtry
                                            </a>
                                        @else
                                            <h4 class="text-base font-bold text-slate-700 mb-1">Brak wpisów</h4>
                                            <p class="text-sm text-slate-500 mb-5">Dodaj swój pierwszy wpis do dziennika praktyk.</p>
                                            <a href="{{ route('entries.create') }}"
                                               class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                                                </svg>
                                                Dodaj pierwszy wpis
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Mobile: karty --}}
            <div class="sm:hidden divide-y divide-slate-100/80">
                @forelse ($entries as $entry)
                    <div class="p-5 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-100/60 flex items-center justify-center flex-shrink-0">
                                    <span class="text-xs font-bold text-indigo-600">
                                        {{ \Carbon\Carbon::parse($entry->entry_date)->format('d') }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-700">
                                        {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('l') }}
                                    </p>
                                    <p class="text-xs text-slate-400">
                                        {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('j F Y') }}
                                    </p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-500 bg-slate-100/60 px-2.5 py-1 rounded-lg">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                {{ $entry->time_from }} — {{ $entry->time_to }}
                            </span>
                        </div>

                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ Str::limit($entry->tasks, 120) }}
                        </p>

                        <div class="flex items-center gap-2 pt-1">
                            <a href="{{ route('entries.edit', $entry->id) }}"
                               class="inline-flex items-center gap-1.5 rounded-lg bg-indigo-50/60 px-3 py-1.5 text-xs font-semibold text-indigo-600 hover:bg-indigo-100/60 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/>
                                </svg>
                                Edytuj
                            </a>

                            <button @click="openDelete('{{ route('entries.destroy', $entry->id) }}', '{{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('j F Y') }}')"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-red-50/60 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100/60 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                </svg>
                                Usuń
                            </button>
                        </div>
                    </div>

                @empty
                    <div class="p-10 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-slate-100/60 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                            </svg>
                        </div>
                        @if(request()->hasAny(['date_from', 'date_to']))
                            <h4 class="text-base font-bold text-slate-700 mb-1">Brak wyników</h4>
                            <p class="text-sm text-slate-500 mb-5">Nie znaleziono wpisów dla wybranego zakresu dat.</p>
                            <a href="{{ route('entries.index') }}"
                               class="inline-flex items-center gap-2 rounded-xl bg-white/60 border border-slate-200/80 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-white/80 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                                Wyczyść filtry
                            </a>
                        @else
                            <h4 class="text-base font-bold text-slate-700 mb-1">Brak wpisów</h4>
                            <p class="text-sm text-slate-500 mb-5">Dodaj swój pierwszy wpis do dziennika praktyk.</p>
                            <a href="{{ route('entries.create') }}"
                               class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                                Dodaj pierwszy wpis
                            </a>
                        @endif
                    </div>
                @endforelse
            </div>

        </div>

        {{-- Paginacja --}}
        @if ($entries->hasPages())
            <div class="pt-2">
                {{ $entries->links() }}
            </div>
        @endif

    </div>
</x-app-layout>