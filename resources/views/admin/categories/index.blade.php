<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Afficher les messages de succès -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('admin.categories.create') }} " class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer une catégorie</a>
                <!-- Liste des catégories -->
                <ul class="divide-y divide-gray-200">

                    @foreach($categories as $category)
                        <li class="flex justify-between items-center py-4">
                            
                            <span class="text-sm">{{ $category->name }}</span>
                            <div class="flex space-x-2">
                                
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Modifier') }}</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Supprimer') }}</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
