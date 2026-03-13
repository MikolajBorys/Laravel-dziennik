<x-app-layout>
    <x-slot name="header">
        Konto
    </x-slot>

    <div class="space-y-6">

        {{-- Nagłówek --}}
        <div>
            <h3 class="text-xl font-bold text-slate-800">Ustawienia konta</h3>
            <p class="text-sm text-slate-500 mt-1">Zarządzaj swoimi danymi osobowymi, hasłem i kontem.</p>
        </div>

        {{-- Dane profilu --}}
        <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-indigo-100/60 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-base font-bold text-slate-800">Dane profilu</h4>
                    <p class="text-xs text-slate-500">Zaktualizuj swoje imię i adres e-mail.</p>
                </div>
            </div>
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Zmiana hasła --}}
        <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-white/70 shadow-sm p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-amber-100/60 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-base font-bold text-slate-800">Zmiana hasła</h4>
                    <p class="text-xs text-slate-500">Upewnij się, że używasz silnego, unikalnego hasła.</p>
                </div>
            </div>
            @include('profile.partials.update-password-form')
        </div>

        {{-- Usuwanie konta --}}
        <div class="bg-white/50 backdrop-blur-md rounded-2xl border border-red-200/40 shadow-sm p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-red-100/60 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-base font-bold text-red-700">Usuń konto</h4>
                    <p class="text-xs text-red-500/70">Trwałe usunięcie konta i wszystkich danych.</p>
                </div>
            </div>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>