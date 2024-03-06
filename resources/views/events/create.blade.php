<!-- resources/views/events/create.blade.php -->
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
                    <div class="container">
                        <h1>Créer un nouvel événement</h1>
                        <form action="{{ route('events.store') }}" method="POST">
                            @csrf
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="location">Lieu :</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Catégorie :</label>
                <input type="text" name="category" id="category" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="available_seats">Nombre de places disponibles :</label>
                <input type="number" name="available_seats" id="available_seats" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer l'événement</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>