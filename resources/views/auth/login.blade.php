@section('title', 'Login')

<x-guest-layout>
    <div
        class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center p-0 m-0 w-full">
        <div class="w-full h-screen flex items-center justify-center px-4 py-12">
            <div class="max-w-md w-full space-y-8 bg-white shadow-2xl rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-700 p-8 text-center">
                    <h2 class="text-4xl font-extrabold text-white">
                        Login
                    </h2>
                    <p class="mt-2 text-sm text-white text-opacity-80">
                        Selamat datang! Silakan masuk ke akun Anda.
                    </p>
                </div>

                <div class="px-8 pb-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Alamat Email')"
                                class="block text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <x-text-input id="email"
                                    class="block w-full pl-4 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username" placeholder="Email Anda" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Kata Sandi')"
                                class="block text-sm font-medium text-gray-700" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <x-text-input id="password"
                                    class="block w-full pl-4 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    type="password" name="password" required autocomplete="current-password"
                                    placeholder="Kata sandi Anda" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                    name="remember">
                                <label for="remember_me" class="ms-2 block text-sm text-gray-900">
                                    {{ __('Ingat saya') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">
                                        {{ __('Lupa kata sandi?') }}
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div>
                            <x-primary-button
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                                {{ __('Masuk') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
