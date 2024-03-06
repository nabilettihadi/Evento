<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management Platform - Home</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-50 text-gray-900">

<!-- Navbar -->
<nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-lg font-bold">Event Platform</a>
        <div class="flex space-x-4">
            <a href="#" class="hover:text-gray-300">Home</a>
            <a href="#" class="hover:text-gray-300">Events</a>
            <a href="#" class="hover:text-gray-300">About</a>
            <a href="#" class="hover:text-gray-300">Contact</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gray-900 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Event Platform</h1>
        <p class="text-lg mb-8">Find and attend exciting events near you!</p>
        <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-2 px-6 rounded-full inline-block">Sign Up</a>
        <a href="{{ route('login') }}" class="border border-white hover:border-gray-300 text-gray-300 font-bold py-2 px-6 rounded-full inline-block ml-4">Log In</a>
    </div>
</section>

<!-- Featured Events Section -->
<section class="py-20">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-8">Featured Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Event Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/400x200" alt="Event Image" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title</h3>
                    <p class="text-gray-600 mb-2">Date: January 1, 2025</p>
                    <p class="text-gray-600 mb-4">Location: Example City</p>
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full inline-block">View Details</a>
                </div>
            </div>
            <!-- Repeat Event Cards Here -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/400x200" alt="Event Image" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title</h3>
                    <p class="text-gray-600 mb-2">Date: January 1, 2025</p>
                    <p class="text-gray-600 mb-4">Location: Example City</p>
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full inline-block">View Details</a>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/400x200" alt="Event Image" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Event Title</h3>
                    <p class="text-gray-600 mb-2">Date: January 1, 2025</p>
                    <p class="text-gray-600 mb-4">Location: Example City</p>
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full inline-block">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Event Platform. All rights reserved.</p>
    </div>
</footer>

</body>
</html>


