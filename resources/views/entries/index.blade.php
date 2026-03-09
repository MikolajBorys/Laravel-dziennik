<x-app-layout>
    <x-slot name="header">
        Wpisy
    </x-slot>

    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">Dziennik praktyk</h3>
                <p class="text-gray-600 mt-1">
                    Tutaj znajdziesz swoje wpisy dzienne z praktyk.
                </p>
            </div>

            <a href="{{ route('entries.create') }}"
               class="px-5 py-2.5 bg-slate-900 text-white rounded-lg hover:bg-slate-800">
                Dodaj wpis
            </a>
        </div>

        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Data</th>
                        <th class="px-6 py-4">Godziny</th>
                        <th class="px-6 py-4">Zadania</th>
                        <th class="px-6 py-4 text-right">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100">
                        <td class="px-6 py-4">Brak wpisów</td>
                        <td class="px-6 py-4">—</td>
                        <td class="px-6 py-4 text-gray-500">Po dodaniu wpisów pojawią się tutaj.</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3 text-sm">
                                <a href="{{ route('entries.edit') }}" class="text-blue-600 hover:underline">
                                    Edytuj
                                </a>
                                <button type="button" class="text-red-600 hover:underline">
                                    Usuń
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>