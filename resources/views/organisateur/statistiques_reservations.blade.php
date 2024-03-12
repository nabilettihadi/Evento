<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistiques des Réservations') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-semibold mb-4">{{ __('Statistiques des Réservations') }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-blue-100 dark:bg-blue-600 dark:text-white rounded-md p-4 shadow-md">
                    <p class="text-lg font-semibold">{{ __('Total des réservations') }}</p>
                    <p class="text-3xl">{{ $totalReservations }}</p>
                </div>
                <div class="bg-green-100 dark:bg-green-600 dark:text-white rounded-md p-4 shadow-md">
                    <p class="text-lg font-semibold">{{ __('Réservations acceptées') }}</p>
                    <p class="text-3xl">{{ $acceptedReservations }}</p>
                </div>
                <div class="bg-yellow-100 dark:bg-yellow-600 dark:text-white rounded-md p-4 shadow-md">
                    <p class="text-lg font-semibold">{{ __('Réservations en attente') }}</p>
                    <p class="text-3xl">{{ $pendingReservations }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

