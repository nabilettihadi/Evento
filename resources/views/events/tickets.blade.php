<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ticket de réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w
-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Ticket de réservation</h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Votre réservation a été confirmée.
                            Veuillez trouver ci-dessous les détails de votre réservation :</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-800 dark:text-gray-200"><span class="font-semibold">Événement:</span>
                            {{ $reservation->event->title }}</ span>
                        </p>
                        <p class="text-gray-800 dark:text-gray-200"><span class="font-semibold">Date:</span>
                            {{ $reservation->event->date }}</span></p>
                        <p class="text-gray-800 dark:text-gray-200"><span class="font-semibold">Lieu:</span>
                            {{ $reservation->event->location }}</span></p>
                        <p class="text-gray-800 dark:text-gray-200"><span class="font-semibold">Quantité de
                                places:</span> {{ $reservation->quantity }}</span></p>
                        <p class="text-gray-800 dark:text-gray-200"><span class="font-semibold">Numéro de
                                réservation:</span> {{ $reservation->id }}</span></p>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="{{ route('dashboard.index') }}"
                            class="text-blue-500 hover:underline">{{ __('Retour au tableau de bord') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
