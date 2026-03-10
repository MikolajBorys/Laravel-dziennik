<x-app-layout>
    <x-slot name="header">
        Dodaj wpis
    </x-slot>

    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nowy wpis dzienny</h3>
        <p class="text-gray-600 mb-6">
            Uzupełnij dane dotyczące dnia praktyk.
        </p>

       <form method="POST" action="{{ route('entries.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="entry_date" class="block text-sm font-medium text-gray-700 mb-1">Data</label>
                    <input type="date" id="entry_date" name="entry_date" value="{{ date('Y-m-d') }}" class="w-full rounded-lg border-gray-300 shadow-sm">
                </div>

                <div></div>

                <div>
                    <label for="time_from" class="block text-sm font-medium text-gray-700 mb-1">Godzina od</label>
                    <input type="time" id="time_from" name="time_from" class="w-full rounded-lg border-gray-300 shadow-sm">
                </div>

                <div>
                    <label for="time_to" class="block text-sm font-medium text-gray-700 mb-1">Godzina do</label>
                    <input type="time" id="time_to" name="time_to" class="w-full rounded-lg border-gray-300 shadow-sm">
                </div>

                <div class="md:col-span-2">
                    <label for="tasks" class="block text-sm font-medium text-gray-700 mb-1">Wykonane zadania</label>
                    <textarea id="tasks" name="tasks" rows="6" class="w-full rounded-lg border-gray-300 shadow-sm"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notatki</label>
                    <textarea id="notes" name="notes" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm"></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('entries.index') }}" class="px-5 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                    Wróć
                </a>

                <button type="submit" class="px-5 py-2.5 bg-slate-900 text-white rounded-lg hover:bg-slate-800">
                    Zapisz wpis
                </button>
            </div>
        </form>
    </div>
</x-app-layout>