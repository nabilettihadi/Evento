<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Réserver un événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Formulaire de réservation -->
                    <form action="{{ route('events.reserve', $event->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="quantity"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Quantité de
                                places</label>
                            <input type="number" id="quantity" name="quantity"
                                class="mt-1 p-2 border rounded-md w-full dark:bg-gray-700 dark:border-gray-600"
                                min="1" value="1" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">{{ __('Réserver') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
