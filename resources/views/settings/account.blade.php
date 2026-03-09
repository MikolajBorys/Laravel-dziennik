<x-app-layout>
    <x-slot name="header">
        Konto
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white shadow rounded-xl p-6">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>