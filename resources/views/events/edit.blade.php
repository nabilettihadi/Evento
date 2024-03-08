<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier l\'événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form action="{{ route('events.update', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                {{ __('Titre') }}:
                            </label>
                            <input type="text" name="title" id="title" value="{{ $event->title }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                {{ __('Description') }}:
                            </label>
                            <textarea name="description" id="description" class="form-textarea w-full" rows="3" required>{{ $event->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                {{ __('Date') }}:
                            </label>
                            <input type="date" name="date" id="date" value="{{ $event->date }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                {{ __('Lieu') }}:
                            </label>
                            <input type="text" name="location" id="location" value="{{ $event->location }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                {{ __('Catégorie') }}:
                            </label>
                            <select name="category_id" id="category_id" class="form-select w-full" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($event->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <div class="mb-4">
                            <label for="available_seats" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                {{ __('Nombre de places disponibles') }}:
                            </label>
                            <input type="number" name="available_seats" id="available_seats" value="{{ $event->available_seats }}" class="form-input w-full" min="1" required>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Modifier l\'événement') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
