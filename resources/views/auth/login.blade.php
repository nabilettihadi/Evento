<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- Votre contenu -->
    <div class="font-sans text-gray-700">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full p-4 m-4 shadow-md rounded-md">
                <div class="md:max-w-md w-full sm:px-6 py-4">
                    <!-- Votre formulaire -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="w-full text-sm border-b border-gray-300 focus:border-[#333] px-2 py-3 outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter email" />
                            <!-- Gestion des erreurs -->
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="w-full text-sm border-b border-gray-300 focus:border-[#333] px-2 py-3 outline-none" type="password" name="password" required autocomplete="current-password" placeholder="Enter password" />
                            <!-- Gestion des erreurs -->
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <!-- Forgot Password Link and Submit Button -->
                        <div class="flex items-center justify-between gap-2 mt-5">
                            <div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-blue-600 font-semibold text-sm hover:underline">Forgot Password?</a>
                                @endif
                            </div>
                            <div>
                                <x-primary-button class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">{{ __('Log in') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="md:h-full max-md:mt-10 bg-[#000842] rounded-xl lg:p-12 p-8">
                    <img src="https://readymadeui.com/signin-image.webp" class="w-full h-full object-contain" alt="login-image" />
                </div>
            </div>
        </div>
    </div>
</body>
</html>
