<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">{{ __("You're logged in!") }}</p>
                    <a href="{{ route('kategorija.show', 'vafeles') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-200">Skatīt produktus</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
