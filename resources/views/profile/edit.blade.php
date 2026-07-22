<x-app-layout>
    <x-slot name="header">
        <h2 class="heading-display text-3xl text-ivory-50">
            My Profile
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- PROFILE CARD -->

            <div class="card-luxury overflow-hidden mb-8">

                <div class="bg-jade-950 h-32 relative">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-jade-950 via-jade-900 to-jade-950"></div>
                </div>

                <div class="px-8 pb-8">

                    <div class="-mt-14 flex items-end gap-6">

                        <div
                            class="w-28 h-28 bg-ivory-100 border-4 border-white shadow-luxury flex items-center justify-center">

                            <svg viewBox="0 0 100 100" class="w-12 h-12 text-gold-600">
                                <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="2"/>
                                <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="2"/>
                                <circle cx="50" cy="50" r="7" fill="currentColor"/>
                            </svg>

                        </div>

                        <div class="pb-2">

                            <h2 class="heading-display text-3xl text-jade-900">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="text-jade-700/70">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                    </div>

                    <div class="mt-6">

                        @if(Auth::user()->role == 'admin')

                            <span
                                class="inline-block bg-jade-900 text-gold-300 px-4 py-1 text-xs tracking-[0.15em] uppercase">

                                Administrator

                            </span>

                        @else

                            <span
                                class="inline-block bg-gold-100 text-gold-800 px-4 py-1 text-xs tracking-[0.15em] uppercase">

                                Guest

                            </span>

                        @endif

                    </div>

                    <div class="grid md:grid-cols-3 gap-6 mt-10">

                        <div class="bg-ivory-200 p-5">

                            <h3 class="label-luxury mb-1">
                                Name
                            </h3>

                            <p class="text-jade-900">
                                {{ Auth::user()->name }}
                            </p>

                        </div>

                        <div class="bg-ivory-200 p-5">

                            <h3 class="label-luxury mb-1">
                                Email
                            </h3>

                            <p class="text-jade-900 break-all">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <div class="bg-ivory-200 p-5">

                            <h3 class="label-luxury mb-1">
                                Member Since
                            </h3>

                            <p class="text-jade-900">
                                {{ Auth::user()->created_at->format('F d, Y') }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- UPDATE PROFILE -->

            <div class="card-luxury p-8 mb-8">

                <h2 class="eyebrow mb-5">
                    Edit Profile
                </h2>

                @include('profile.partials.update-profile-information-form')

            </div>

            <!-- CHANGE PASSWORD -->

            <div class="card-luxury p-8 mb-8">

                <h2 class="eyebrow mb-5">
                    Change Password
                </h2>

                @include('profile.partials.update-password-form')

            </div>

            <!-- DELETE ACCOUNT -->

            <div class="card-luxury p-8 border-t-2 border-red-700/70">

                <h2 class="eyebrow text-red-700 mb-5">
                    Delete Account
                </h2>

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</x-app-layout>
