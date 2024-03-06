<x-guest-layout>

        <!-- Image Section -->
        <div class="p-4">
            <img src="https://readymadeui.com/signin-image.webp" class="max-w-[90%] w-full h-auto mx-auto" alt="login-image" />
        </div>
        <!-- Form Section -->
        <div class="p-6 bg-white h-full lg:w-11/12 lg:ml-auto">
            <form method="POST" action="{{ route('register') }}" class="max-w-md w-full mx-auto">
                @csrf
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Create an Account</h2>

                <div class="flex items-center mb-6">
                    <input type="radio" id="role_utilisateur" name="role" value="utilisateur" checked>
                    <label for="role_utilisateur" class="ml-2 text-sm text-gray-700">Utilisateur</label>
                    <input type="radio" id="role_organisateur" name="role" value="organisateur">
                    <label for="role_organisateur" class="ml-2 text-sm text-gray-700">Organisateur</label>
                </div>                
                <!-- Full Name -->
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" type="text" name="name" required class="w-full bg-gray-100 text-sm border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-yellow-400" placeholder="Enter your name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" required class="w-full bg-gray-100 text-sm border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-yellow-400" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required class="w-full bg-gray-100 text-sm border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-yellow-400" placeholder="Enter your password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required class="w-full bg-gray-100 text-sm border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-yellow-400" placeholder="Confirm your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <!-- Terms and Conditions -->
                <div class="flex items-center mb-6">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-yellow-400 border border-gray-300 rounded-sm focus:ring-0 focus:outline-none" />
                    <label for="remember-me" class="ml-2 text-sm text-gray-700">I accept the <a href="javascript:void(0);" class="text-yellow-400 font-semibold hover:underline">Terms and Conditions</a></label>
                </div>
                <!-- Register Button -->
                <div>
                    <x-primary-button class="w-full mt-4">
                        {{ __('Register') }}
                    </x-primary-button>
                    <p class="text-sm mt-4 text-gray-700">Already have an account? <a href="{{ route('login') }}" class="text-yellow-400 font-semibold hover:underline">Login here</a></p>
                </div>
            </form>
        </div>

</x-guest-layout>




