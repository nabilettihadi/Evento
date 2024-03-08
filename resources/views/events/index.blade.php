<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">{{ __('Événements disponibles') }}</h2>

                    <form action="{{ route('search.events') }}" method="GET"
                        class="flex items-center border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                        <input type="text" name="search" placeholder="Rechercher par titre..."
                            class="py-2 px-4 focus:outline-none focus:border-blue-500 flex-1">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4">Rechercher</button>
                    </form>

                    @foreach ($categories as $category)
                        <a href="{{ route('events.category', $category->id) }}">{{ $category->name }}</a>
                    @endforeach

                    @if ($events->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($events as $event)
                                <div
                                    class="rounded-lg overflow-hidden shadow-lg border border-gray-300 dark:border-gray-700">
                                    <img class="w-full h-40 object-cover"
                                        src="https://source.unsplash.com/400x300/?event" alt="{{ $event->title }}">
                                    <div class="p-6">
                                        <h4 class="text-lg font-semibold mb-2">{{ $event->title }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('Date') }}:
                                            {{ $event->date }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('Lieu') }}:
                                            {{ $event->location }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ __('Catégorie') }}:
                                            {{ $event->category->name }}</p>
                                        <a href="{{ route('events.show', $event->id) }}"
                                            class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold text-center py-2 px-4 rounded">{{ __('Détails') }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">{{ __('Aucun événement disponible pour le moment.') }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
