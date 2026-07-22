@extends('layouts.admin')

@section('content')

<div class="eyebrow mb-3">Administration</div>

<h1 class="heading-display text-4xl text-jade-900 mb-8 animate-fade-in">
    Overview
</h1>

<!-- Statistics -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div
        x-data="countUp({{ \App\Models\RoomType::count() }})"
        x-init="start()"
        class="card-luxury p-6 card-hover animate-fade-in stagger-1">

        <h2 class="label-luxury">
            Room Types
        </h2>

        <p class="font-display text-4xl text-jade-900 mt-2" x-text="value"></p>

    </div>

    <div
        x-data="countUp({{ \App\Models\Booking::count() }})"
        x-init="start()"
        class="card-luxury p-6 card-hover animate-fade-in stagger-2">

        <h2 class="label-luxury">
            Bookings
        </h2>

        <p class="font-display text-4xl text-jade-900 mt-2" x-text="value"></p>

    </div>

    <div
        x-data="countUp({{ \App\Models\User::where('role','user')->count() }})"
        x-init="start()"
        class="card-luxury p-6 card-hover animate-fade-in stagger-3">

        <h2 class="label-luxury">
            Users
        </h2>

        <p class="font-display text-4xl text-gold-700 mt-2" x-text="value"></p>

    </div>

    <div
        x-data="countUp({{ \App\Models\Booking::where('status','Pending')->count() }})"
        x-init="start()"
        class="card-luxury p-6 card-hover animate-fade-in stagger-4 border-l-2 border-l-gold-500">

        <h2 class="label-luxury">
            Pending
        </h2>

        <p class="font-display text-4xl text-jade-900 mt-2" x-text="value"></p>

    </div>

</div>

<!-- Calendar -->

<div class="card-luxury mt-10 p-6 animate-fade-in">

    <h2 class="eyebrow mb-5">

        Booking Calendar

    </h2>

    <div id="calendar"></div>

</div>

<!-- Booking Details -->

<div
    x-data="{ show: false, customer: '', status: '', checkOut: '' }"
    x-on:booking-selected.window="show = true; customer = $event.detail.customer; status = $event.detail.status; checkOut = $event.detail.checkOut"
    x-show="show"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="bg-jade-950 p-6 mt-8">

    <h2 class="eyebrow text-gold-400 mb-4">

        Booking Details

    </h2>

    <p class="text-ivory-100"><strong class="text-gold-300 font-medium">Customer:</strong> <span x-text="customer"></span></p>

    <p class="text-ivory-100"><strong class="text-gold-300 font-medium">Status:</strong> <span x-text="status"></span></p>

    <p class="text-ivory-100"><strong class="text-gold-300 font-medium">Check-out:</strong> <span x-text="checkOut"></span></p>

</div>

<script>

document.addEventListener('alpine:init', () => {
    Alpine.data('countUp', (target) => ({
        value: 0,
        start() {
            const duration = 700;
            const steps = 30;
            const increment = target / steps;
            let current = 0;
            let count = 0;

            const timer = setInterval(() => {
                count++;
                current += increment;
                this.value = count >= steps ? target : Math.round(current);

                if (count >= steps) clearInterval(timer);
            }, duration / steps);
        }
    }));
});

document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin
        ],

        initialView: 'dayGridMonth',

        height: 700,

        events: "{{ route('calendar.events') }}",

        eventClick: function(info){

            window.dispatchEvent(new CustomEvent('booking-selected', {
                detail: {
                    customer: info.event.extendedProps.customer,
                    status: info.event.extendedProps.status,
                    checkOut: info.event.extendedProps.checkOut,
                }
            }));

        }

    });

    calendar.render();

});

</script>

@endsection
