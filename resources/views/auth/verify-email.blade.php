<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-ivory-100 px-6 py-12">
        <div class="card-luxury p-10 w-full max-w-lg animate-scale-in">

            <div class="text-center mb-8">
                <svg viewBox="0 0 100 100" class="w-14 h-14 mx-auto mb-5 text-gold-500">
                    <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <circle cx="50" cy="50" r="6" fill="currentColor"/>
                </svg>
                <h2 class="heading-display text-4xl text-jade-900">Verify Email</h2>
            </div>

            <div class="mb-4 text-sm text-jade-700/80 font-light leading-6">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-jade-700">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-sm text-jade-700/70 hover:text-gold-600 underline transition-colors">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
