<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-ivory-100 px-6 py-12">
        <div class="card-luxury p-10 w-full max-w-lg animate-scale-in">

            <div class="text-center mb-8">
                <svg viewBox="0 0 100 100" class="w-14 h-14 mx-auto mb-5 text-gold-500">
                    <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <circle cx="50" cy="50" r="6" fill="currentColor"/>
                </svg>
                <h2 class="heading-display text-4xl text-jade-900">Forgot Password</h2>
            </div>

            <div class="mb-4 text-sm text-jade-700/80 font-light leading-6">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
