<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <h1 class="text-2xl font-bold mb-4">Créer un nouvel événement</h1>
                        <form action="{{ route('events.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Validation des réservations :</label>
                                <div class="mt-1">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="reservation_type" value="automatic" class="form-radio h-4 w-4 text-indigo-600" checked>
                                        <span class="ml-2">Automatique</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6">
                                        <input type="radio" name="reservation_type" value="manual" class="form-radio h-4 w-4 text-indigo-600">
                                        <span class="ml-2">Manuelle</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titre :</label>
                                <input type="text" name="title" id="title" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
                                <textarea name="description" id="description" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="date" class="block text-sm font-medium text-gray-700">Date :</label>
                                <input type="date" name="date" id="date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Lieu :</label>
                                <input type="text" name="location" id="location" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                            </div>
                            <div class="mb-4">
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie :</label>
                                <select name="category_id" id="category_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="available_seats" class="block text-sm font-medium text-gray-700">Nombre de places disponibles :</label>
                                <input type="number" name="available_seats" id="available_seats" class="mt-1 p-2 w-full border border-gray-300 rounded-md" min="1" required>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer l'événement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

