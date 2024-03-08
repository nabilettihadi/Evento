<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($events as $event)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <img class="w-full h-40 object-cover" src="https://source.unsplash.com/400x300/?event"
                    alt="{{ $event->title }}">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h4 class="text-lg font-semibold mb-2">{{ $event->title }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('Date') }}: {{ $event->date }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('Lieu') }}: {{ $event->location }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('Catégorie') }}:
                        {{ $event->category->name }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('events.show', $event->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold text-center py-2 px-4 rounded">{{ __('Détails') }}</a>
                        <div class="flex space-x-4">
                            <form action="{{ route('admin.events.approve', $event->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">{{ __('Approve') }}</button>
                            </form>
                            <form action="{{ route('admin.events.reject', $event->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">{{ __('Reject') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
