<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-ivory-100 px-6 py-12">
        <div class="card-luxury p-10 w-full max-w-lg animate-scale-in">

            <div class="text-center mb-8">
                <svg viewBox="0 0 100 100" class="w-14 h-14 mx-auto mb-5 text-gold-500">
                    <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <circle cx="50" cy="50" r="6" fill="currentColor"/>
                </svg>
                <h2 class="heading-display text-4xl text-jade-900">Confirm Password</h2>
            </div>

            <div class="mb-4 text-sm text-jade-700/80 font-light leading-6">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-6">
                    <x-primary-button>
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
