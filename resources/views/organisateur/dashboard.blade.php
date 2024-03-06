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
                    {{ __("You're logged in!") }}

                    <a href="{{ route('events.create') }}" class="text-blue-500 hover:text-blue-700">Créer un événement</a>

                    @if ($evenements->count() > 0)
                        <h3 class="mt-5 mb-3 text-lg font-semibold">Vos événements :</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($evenements as $evenement)
                                <div class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-md">
                                    <div class="p-4">
                                        <h4 class="text-lg font-semibold">{{ $evenement->title }}</h4>
                                        <p class="text-sm text-gray-500">{{ $evenement->date }}</p>
                                        <p class="text-sm text-gray-500">{{ $evenement->location }}</p>
                                        <p class="text-sm text-gray-500">{{ $evenement->category }}</p>
                                    </div>
                                    <div class="px-4 pb-4">
                                        <a href="{{ route('events.edit', $evenement->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                                        <form action="{{ route('events.destroy', $evenement->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Supprimer</button>
                                        </form>
                                        <a href="{{ route('events.show', $evenement->id) }}" class="text-green-500 hover:text-green-700">Détails</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="mt-5">Vous n'avez pas encore créé d'événements.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



