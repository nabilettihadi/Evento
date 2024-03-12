<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Reservations') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-semibold mb-4">Event Reservations</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event Location</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($reservations as $reservation)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation['event_title'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation['event_date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation['event_location'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation['user_name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation['status'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($reservation['status'] === 'pending')
                                <form action="{{ route('reservations.accept', ['reservationId' => $reservation['id']]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900 focus:outline-none">
                                        Accepter
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>



