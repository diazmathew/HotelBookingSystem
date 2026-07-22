<x-guest-layout>

<div class="min-h-screen flex bg-ivory-100">

    <!-- Left Side -->
    <div class="hidden lg:flex w-1/2 relative overflow-hidden bg-jade-950">

        <div class="pointer-events-none absolute top-0 right-0 w-[600px] h-[600px] rounded-full bg-jade-700/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-1/4 -left-1/4 w-[600px] h-[600px] rounded-full bg-gold-500/10 blur-3xl"></div>

        <div class="relative z-10 flex flex-col justify-center items-center text-ivory-100 px-10 text-center animate-fade-in">

            <svg viewBox="0 0 100 100" class="w-16 h-16 mb-8 text-gold-400">
                <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                <circle cx="50" cy="50" r="6" fill="currentColor"/>
            </svg>

            <div class="eyebrow text-gold-400 justify-center mb-4">Join Us</div>

            <h1 class="heading-display text-ivory-50 text-5xl mb-6">
                Z4ID
            </h1>

            <p class="text-lg text-ivory-300/80 font-light max-w-sm">
                Create your account and start booking your perfect stay.
            </p>

        </div>

    </div>

    <!-- Right Side -->
    <div class="w-full lg:w-1/2 flex justify-center items-center bg-ivory-100 px-6 py-12">

        <div
            x-data="{ loading: false }"
            class="card-luxury p-10 w-full max-w-md animate-scale-in {{ $errors->any() ? 'animate-shake' : '' }}">

            <div class="text-center mb-8">

                <svg viewBox="0 0 100 100" class="w-14 h-14 mx-auto mb-5 text-gold-500">
                    <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <circle cx="50" cy="50" r="6" fill="currentColor"/>
                </svg>

                <h2 class="heading-display text-4xl text-jade-900">
                    Create Account
                </h2>

                <p class="text-jade-700/70 mt-2 font-light">
                    Join the Z4ID Booking
                </p>

            </div>

            <form
                method="POST"
                action="{{ route('register') }}"
                x-on:submit="loading = true"
            >

                @csrf

                <!-- Name -->
                <div class="mb-5">

                    <label class="label-luxury">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="input-luxury">

                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>

                </div>

                <!-- Email -->
                <div class="mb-5">

                    <label class="label-luxury">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="input-luxury">

                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                </div>

                <!-- Password -->
                <div class="mb-5" x-data="{ visible: false }">

                    <label class="label-luxury">
                        Password
                    </label>

                    <div class="relative">

                        <input
                            :type="visible ? 'text' : 'password'"
                            name="password"
                            required
                            class="input-luxury pr-14">

                        <button
                            type="button"
                            x-on:click="visible = !visible"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-xs uppercase tracking-wide text-jade-700/50 hover:text-gold-600 transition-colors">
                            <span x-show="!visible">show</span>
                            <span x-show="visible" x-cloak>hide</span>
                        </button>

                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>

                </div>

                <!-- Confirm Password -->
                <div class="mb-6">

                    <label class="label-luxury">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        class="input-luxury">

                </div>

                <button
                    type="submit"
                    :disabled="loading"
                    class="btn-gold w-full disabled:opacity-70 inline-flex items-center justify-center gap-2">

                    <svg
                        x-show="loading"
                        x-cloak
                        class="animate-spin h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>

                    <span x-text="loading ? 'Creating account…' : 'Create Account'"></span>

                </button>

            </form>

            <div class="text-center mt-6 text-sm text-jade-700">

                Already have an account?

                <a
                    href="{{ route('login') }}"
                    class="text-gold-700 font-medium hover:text-gold-600">

                    Login Here

                </a>

            </div>

            <div class="divider-ornament"><span></span></div>

            <p class="text-center text-xs tracking-wide text-jade-700/50 uppercase">

                © {{ date('Y') }} Z4ID Booking

            </p>

        </div>

    </div>

</div>

</x-guest-layout>
