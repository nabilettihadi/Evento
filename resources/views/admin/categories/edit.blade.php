<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Formulaire de modification de catégorie -->
                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="w-full max-w-md mx-auto">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">{{ __('Nom de la catégorie') }}</label>
                        <input type="text" id="name" name="name" value="{{ $category->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Modifier') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
