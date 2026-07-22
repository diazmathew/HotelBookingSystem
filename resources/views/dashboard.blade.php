<x-app-layout>
    <x-slot name="header">
        <h2 class="heading-display text-3xl text-ivory-50">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-luxury">
                <div class="p-8 text-jade-800 font-light">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
