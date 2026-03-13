<x-app-layout>
    <x-slot name="header">
        Szkoła
    </x-slot>

    <div class="space-y-6">

        {{-- Alerty --}}
        @if (session('success'))
            <div x-data="{ show: true }"
                 x-show="show"
                 x-init="setTimeout(() => show = false, 3000)"
                 x-transition
                 class="flex items-center gap-3 rounded-xl border border-green-200/60 bg-green-50/50 backdrop-blur-md px-5 py-4 text-green-700">
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
                <span class="text-sm font-medium">W formularzu są błędy. Popraw pola zaznaczone poniżej.</span>
            </div>
        @endif

        {{-- Karta formularza --}}
        <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-6 sm:p-8">

            <form method="POST" action="{{ route('settings.school.update') }}">
                @csrf

                <div class="space-y-8">

                    {{-- Sekcja: Dane szkoły --}}
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-indigo-100/60 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-slate-800">Dane szkoły</h4>
                                <p class="text-xs text-slate-500">Nazwa, adres i klasa.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Nazwa szkoły --}}
                            <div class="md:col-span-2">
                                <label for="school_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nazwa szkoły</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 21h19.5M3.75 3v18m4.5-18v18M15 3v18m4.5-18v18M6 6.75h.008M6 9.75h.008M6 12.75h.008M6 15.75h.008M17.25 6.75h.008M17.25 9.75h.008M17.25 12.75h.008M17.25 15.75h.008M9.75 21V18a2.25 2.25 0 0 1 2.25-2.25h0A2.25 2.25 0 0 1 14.25 18v3"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="school_name" name="school_name"
                                           value="{{ old('school_name', $profile?->school_name) }}"
                                           placeholder="np. Zespół Szkół Technicznych"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                </div>
                                @error('school_name')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Ulica --}}
                            <div>
                                <label for="street" class="block text-sm font-semibold text-slate-700 mb-1.5">Ulica</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="street" name="street"
                                           value="{{ old('street', $profile?->street) }}"
                                           placeholder="np. ul. Szkolna"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                </div>
                                @error('street')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Numer --}}
                            <div>
                                <label for="street_number" class="block text-sm font-semibold text-slate-700 mb-1.5">Numer</label>
                                <input type="text" id="street_number" name="street_number"
                                       value="{{ old('street_number', $profile?->street_number) }}"
                                       placeholder="np. 15a"
                                       class="block w-full px-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                @error('street_number')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Kod pocztowy --}}
                            <div>
                                <label for="postal_code" class="block text-sm font-semibold text-slate-700 mb-1.5">Kod pocztowy</label>
                                <input type="text" id="postal_code" name="postal_code"
                                       value="{{ old('postal_code', $profile?->postal_code) }}"
                                       maxlength="6"
                                       placeholder="00-000"
                                       class="block w-full px-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                @error('postal_code')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Miasto --}}
                            <div>
                                <label for="city" class="block text-sm font-semibold text-slate-700 mb-1.5">Miasto</label>
                                <input type="text" id="city" name="city"
                                       value="{{ old('city', $profile?->city) }}"
                                       placeholder="np. Warszawa"
                                       class="block w-full px-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                @error('city')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Kraj --}}
                            <div>
                                <label for="country" class="block text-sm font-semibold text-slate-700 mb-1.5">Kraj</label>
                                <input type="text" id="country" name="country"
                                       value="{{ old('country', $profile?->country ?? 'Polska') }}"
                                       class="block w-full px-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                @error('country')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Klasa --}}
                            <div>
                                <label for="class_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Klasa</label>
                                <input type="text" id="class_name" name="class_name"
                                       value="{{ old('class_name', $profile?->class_name) }}"
                                       placeholder="np. 3Ti"
                                       class="block w-full px-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                @error('class_name')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Separator --}}
                    <div class="border-t border-slate-200/50"></div>

                    {{-- Sekcja: Opiekun praktyk --}}
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-purple-100/60 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-slate-800">Opiekun praktyk w szkole</h4>
                                <p class="text-xs text-slate-500">Dane kontaktowe nauczyciela odpowiedzialnego za praktyki.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Imię i nazwisko --}}
                            <div>
                                <label for="supervisor_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Imię i nazwisko</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="supervisor_name" name="supervisor_name"
                                           value="{{ old('supervisor_name', $profile?->supervisor_name) }}"
                                           placeholder="np. Jan Kowalski"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                </div>
                                @error('supervisor_name')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Telefon --}}
                            <div>
                                <label for="supervisor_phone" class="block text-sm font-semibold text-slate-700 mb-1.5">Telefon</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="supervisor_phone" name="supervisor_phone"
                                           value="{{ old('supervisor_phone', $profile?->supervisor_phone) }}"
                                           placeholder="np. 123 456 789"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                </div>
                                @error('supervisor_phone')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- E-mail --}}
                            <div class="md:col-span-2">
                                <label for="supervisor_email" class="block text-sm font-semibold text-slate-700 mb-1.5">E-mail</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                                        </svg>
                                    </div>
                                    <input type="email" id="supervisor_email" name="supervisor_email"
                                           value="{{ old('supervisor_email', $profile?->supervisor_email) }}"
                                           placeholder="np. jan.kowalski@szkola.pl"
                                           class="block w-full pl-11 pr-4 py-3 rounded-xl bg-white/60 border border-slate-200/80 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 transition duration-200" />
                                </div>
                                @error('supervisor_email')
                                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Separator + przycisk --}}
                <div class="border-t border-slate-200/50 mt-8 mb-6"></div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 hover:from-indigo-600 hover:to-indigo-700 active:scale-[0.98] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                        Zapisz dane szkoły
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

{{-- Kod pocztowy: auto-formatowanie --}}
<script>
    document.getElementById('postal_code').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 2) {
            value = value.slice(0,2) + '-' + value.slice(2,5);
        }
        e.target.value = value;
    });
</script>