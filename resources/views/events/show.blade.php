<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 mt-6">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-gray-200">Event Details</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">Details of the event</p>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Title</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:col-span-2">{{ $event->title }}</dd>
                    </div>
                    <div class="bg-white dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:col-span-2">{{ $event->description }}</dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:col-span-2">{{ $event->date }}</dd>
                    </div>
                    <div class="bg-white dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Location</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:col-span-2">{{ $event->location }}</dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:col-span-2">{{ $event->category }}</dd>
                    </div>
                    <div class="bg-white dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Available Seats</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:col-span-2">{{ $event->available_seats }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>

