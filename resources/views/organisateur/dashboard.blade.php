<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('events.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">{{ __('Créer un événement') }}</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                
                @foreach ($evenements as $evenement)
                    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md hover:shadow-lg">
                        <img class="w-full h-56 object-cover object-center" src="{{ 'https://source.unsplash.com/random/800x600/?Event'.$loop->index }}" alt="{{ $evenement->title }}">
                        <div class="p-6">
                            <h4 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">{{ $evenement->title }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Date :') }} {{ $evenement->date }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Lieu :') }} {{ $evenement->location }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Catégorie :') }} {{ $evenement->category->name }}</p>
                        </div>
                        <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ route('events.edit', $evenement->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">{{ __('Modifier') }}</a>
                            <form action="{{ route('events.destroy', $evenement->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 mr-4">{{ __('Supprimer') }}</button>
                            </form>
                            <a href="{{ route('events.show', $evenement->id) }}" class="text-green-500 hover:text-green-700">{{ __('Détails') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($evenements->isEmpty())
                <p class="text-lg text-gray-700 dark:text-gray-300 mt-6">{{ __("Vous n'avez pas encore créé d'événements.") }}</p>
            @endif
        </div>
    </div>
</x-app-layout>





