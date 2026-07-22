@extends('layouts.user')

@section('content')

<div class="eyebrow mb-3">Guest Services</div>

<h1 class="heading-display text-4xl text-jade-900 mb-8 animate-fade-in">
    Welcome, {{ auth()->user()->name }}
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="card-luxury p-8 animate-fade-in stagger-1">

        <h2 class="label-luxury mb-2">
            Account
        </h2>

        <p class="text-jade-900 text-lg">
            {{ auth()->user()->name }}
        </p>

        <p class="mt-1 text-jade-700/70 text-sm">
            Role: <span class="text-gold-700 font-medium">{{ auth()->user()->role }}</span>
        </p>

    </div>

    <div
        x-data="{ value: 0 }"
        x-init="
            let target = {{ \App\Models\RoomType::count() }};
            let steps = 20, count = 0, inc = target / steps;
            let t = setInterval(() => {
                count++;
                value = count >= steps ? target : Math.round(inc * count);
                if (count >= steps) clearInterval(t);
            }, 30);
        "
        class="card-luxury p-8 animate-fade-in stagger-2">

        <h2 class="label-luxury mb-2">
            Available Room Types
        </h2>

        <p class="font-display text-5xl mt-2 text-jade-900" x-text="value"></p>

    </div>

</div>

<div class="card-luxury mt-8 p-8 animate-fade-in stagger-3 bg-jade-950 border-jade-950">

    <h2 class="heading-display text-2xl text-ivory-50">
        Ready to Book?
    </h2>

    <p class="text-ivory-300/70 mt-2 font-light">
        Reserve your room in just a few steps.
    </p>

    <a href="{{ route('booking.create') }}" class="btn-gold mt-6 inline-block">
        Book a Room
    </a>

</div>

<!-- Room Booking Calendar -->

<div class="card-luxury mt-8 p-6 animate-fade-in stagger-4">

    <h2 class="eyebrow mb-2">
        Room Booking Calendar
    </h2>

    <p class="text-jade-700/70 mb-5 font-light">
        See which rooms are already booked before making a reservation.
    </p>

    <div class="flex flex-wrap items-center gap-4 mb-4 text-sm">

        <span class="flex items-center gap-2">
            <span class="w-3 h-3 inline-block rounded-full" style="background:#22c55e"></span>
            Confirmed
        </span>

        <span class="flex items-center gap-2">
            <span class="w-3 h-3 inline-block rounded-full" style="background:#f59e0b"></span>
            Pending
        </span>

        <span class="flex items-center gap-2">
            <span class="w-3 h-3 inline-block rounded-full" style="background:#ef4444"></span>
            Cancelled
        </span>

    </div>

    <div class="bg-white border border-jade-800/10 p-4 shadow-sm">
        <div id="roomCalendar"></div>
    </div>

</div>

<!-- Booking Details -->

<div
    x-data="{ show: false, room: '', status: '', checkOut: '' }"
    x-on:room-booking-selected.window="show = true; room = $event.detail.room; status = $event.detail.status; checkOut = $event.detail.checkOut"
    x-show="show"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="bg-jade-950 p-6 mt-6">

    <h2 class="eyebrow text-gold-400 mb-4">
        Booking Details
    </h2>

    <p class="text-ivory-100"><strong class="text-gold-300 font-medium">Room:</strong> <span x-text="room"></span></p>

    <p class="text-ivory-100"><strong class="text-gold-300 font-medium">Status:</strong> <span x-text="status"></span></p>

    <p class="text-ivory-100"><strong class="text-gold-300 font-medium">Check-out:</strong> <span x-text="checkOut"></span></p>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('roomCalendar');

    let calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin
        ],

        initialView: 'dayGridMonth',

        height: 650,

        events: "{{ route('calendar.events') }}",

        eventClick: function (info) {

            window.dispatchEvent(new CustomEvent('room-booking-selected', {
                detail: {
                    room: info.event.title,
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
