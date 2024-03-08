<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 sm:rounded-lg">
                <!-- Formulaire d'ajout de catégorie -->
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de la catégorie</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

