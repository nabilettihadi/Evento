<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-lg shadow-md">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Ticket de Réservation</h2>
            </div>
            <div class="mb-6">
                <p class="font-semibold">ID de Réservation:</p>
                <p>{{ $reservation->id }}</p>
            </div>
            <div class="mb-6">
                <p class="font-semibold">Événement:</p>
                <p>{{ $reservation->event->title }}</p>
            </div>
            <div class="mb-6">
                <p class="font-semibold">Date:</p>
                <p>{{ $reservation->event->date }}</p>
            </div>
            <div class="mb-6">
                <p class="font-semibold">Lieu:</p>
                <p>{{ $reservation->event->location }}</p>
            </div>
            <div class="mb-6">
                <p class="font-semibold">Status:</p>
                <p>{{ ucfirst($reservation->status) }}</p>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Retour au Tableau de Bord
                </a>
            </div>
        </div>
    </div>
</body>
</html>
