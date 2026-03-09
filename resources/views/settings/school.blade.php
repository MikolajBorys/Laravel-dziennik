<x-app-layout>
    <x-slot name="header">
        Szkoła
    </x-slot>

    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Dane szkoły</h3>
        <p class="text-gray-600 mb-6">
            Uzupełnij dane szkoły oraz opiekuna praktyk w szkole.
        </p>

        @if (session('success'))
            <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
                W formularzu są błędy. Popraw pola zaznaczone poniżej.
            </div>
        @endif

        <form method="POST" action="{{ route('settings.school.update') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="school_name" class="block text-sm font-medium text-gray-700 mb-1">Nazwa szkoły</label>
                    <input type="text" id="school_name" name="school_name" value="{{ old('school_name', $profile?->school_name) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('school_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="street" class="block text-sm font-medium text-gray-700 mb-1">Ulica</label>
                    <input type="text" id="street" name="street" value="{{ old('street', $profile?->street) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('street')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="street_number" class="block text-sm font-medium text-gray-700 mb-1">Numer</label>
                    <input type="text" id="street_number" name="street_number" value="{{ old('street_number', $profile?->street_number) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('street_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Kod pocztowy</label>
                    <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $profile?->postal_code) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('postal_code')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Miasto</label>
                    <input type="text" id="city" name="city" value="{{ old('city', $profile?->city) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('city')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Kraj</label>
                    <input type="text" id="country" name="country" value="{{ old('country', $profile?->country ?? 'Polska') }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('country')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="class_name" class="block text-sm font-medium text-gray-700 mb-1">Klasa</label>
                    <input type="text" id="class_name" name="class_name" value="{{ old('class_name', $profile?->class_name) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('class_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 pt-4 border-t border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Opiekun praktyk w szkole</h4>
                </div>

                <div>
                    <label for="supervisor_name" class="block text-sm font-medium text-gray-700 mb-1">Imię i nazwisko opiekuna</label>
                    <input type="text" id="supervisor_name" name="supervisor_name" value="{{ old('supervisor_name', $profile?->supervisor_name) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('supervisor_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="supervisor_phone" class="block text-sm font-medium text-gray-700 mb-1">Telefon opiekuna</label>
                    <input type="text" id="supervisor_phone" name="supervisor_phone" value="{{ old('supervisor_phone', $profile?->supervisor_phone) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('supervisor_phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="supervisor_email" class="block text-sm font-medium text-gray-700 mb-1">E-mail opiekuna</label>
                    <input type="email" id="supervisor_email" name="supervisor_email" value="{{ old('supervisor_email', $profile?->supervisor_email) }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                    @error('supervisor_email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-5 py-2.5 bg-slate-900 text-white rounded-lg hover:bg-slate-800">
                    Zapisz
                </button>
            </div>
        </form>
    </div>
</x-app-layout>