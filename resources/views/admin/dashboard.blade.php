<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">{{ __('Gestion') }}</h3>
                        <ul class="list-none">
                            <li class="mb-3">
                                <a href="{{ route('admin.categories.index') }}"
                                    class="block px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg">
                                    {{ __('Gérer les catégories') }}
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('admin.categories.create') }}"
                                    class="block px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg">
                                    {{ __('Créer une catégorie') }}
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('admin.users.index') }}"
                                    class="block px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg">
                                    {{ __('Gérer les utilisateurs') }}
                                </a>
                            </li>
                            <!-- Ajoutez d'autres liens vers les pages nécessaires -->
                        </ul>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">{{ __('Statistiques') }}</h3>
                        <p class="mb-2">{{ __('Nombre total d\'utilisateurs') }}: {{ $totalUsers }}</p>
                        <p class="mb-2">{{ __('Nombre total d\'organisateurs') }}: {{ $totalOrganisateurs }}</p>
                        <p class="mb-2">{{ __('Nombre total d\'événements') }}: {{ $totalEvents }}</p>
                        <p class="mb-2">{{ __('Nombre total de catégories') }}: {{ $totalCategories }}</p>
                        <!-- Ajoutez d'autres statistiques selon vos besoins -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



