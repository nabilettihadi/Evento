<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach ($users as $user)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $user->email }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2">Role: {{ ucfirst($user->role) }}</p>
                    <div class="flex justify-end">
                        @if ($user->banned)
                        <form method="POST" action="{{ route('unsuspendUser', ['userId' => $user->id]) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                                <i class="fas fa-check mr-2"></i> {{ __('Réactiver') }}
                            </button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('suspendUser', ['userId' => $user->id]) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                                <i class="fas fa-ban mr-2"></i> {{ __('Suspendre') }}
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>


