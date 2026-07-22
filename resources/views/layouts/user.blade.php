<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z4ID Booking</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:500,600,700|jost:300,400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-ivory-100 font-sans">

<div class="flex" x-data="{ sidebarOpen: false }">

    <!-- Mobile top bar -->
    <div class="md:hidden fixed top-0 inset-x-0 h-16 bg-jade-900 text-ivory-100 flex items-center justify-between px-5 z-40 border-b border-gold-500/30">
        <span class="font-display text-xl tracking-wide text-gold-400">Z4ID</span>
        <button x-on:click="sidebarOpen = !sidebarOpen" class="text-2xl leading-none btn-press text-gold-400">
            <span x-show="!sidebarOpen">☰</span>
            <span x-show="sidebarOpen" x-cloak>✕</span>
        </button>
    </div>

    <!-- Overlay (mobile) -->
    <div
        x-show="sidebarOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-on:click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-30 md:hidden">
    </div>

    <!-- Sidebar -->
    <aside
        class="w-72 h-screen bg-jade-900 text-ivory-100 fixed md:static inset-y-0 left-0 z-40 transform transition-transform duration-300 ease-in-out md:translate-x-0 flex flex-col"
        x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <div class="p-8 border-b border-gold-500/20">
            <div class="eyebrow text-gold-400 mb-2">Guest Services</div>
            <div class="font-display text-3xl tracking-wide text-ivory-50">Z4ID</div>
        </div>

        <nav class="mt-4 flex-1 overflow-y-auto">

            @php
                $navLink = fn($active) => 'flex items-center gap-3 px-8 py-3.5 text-sm tracking-[0.08em] uppercase transition-all duration-150 hover:bg-jade-800 hover:pl-10 border-l-2 '
                    . ($active ? 'border-gold-400 bg-jade-800/70 text-gold-300 font-medium' : 'border-transparent text-ivory-300/70');
            @endphp

            <a href="{{ route('dashboard') }}" class="{{ $navLink(request()->routeIs('dashboard')) }}">
                <span>Dashboard</span>
            </a>

            <a href="{{ route('booking.create') }}" class="{{ $navLink(request()->routeIs('booking.create')) }}">
                <span>Book a Room</span>
            </a>

            <a href="{{ route('my.bookings') }}" class="{{ $navLink(request()->routeIs('my.bookings')) }}">
                <span>My Bookings</span>
            </a>

            <a href="{{ route('profile.edit') }}" class="{{ $navLink(request()->routeIs('profile.edit')) }}">
                <span>Profile</span>
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full text-left px-8 py-3.5 text-sm tracking-[0.08em] uppercase text-ivory-300/70 hover:bg-red-900/40 hover:text-red-200 transition-colors duration-150">
                    Logout
                </button>
            </form>

        </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-6 md:p-10 pt-24 md:pt-10 animate-fade-in">
        @yield('content')
    </main>

</div>

</body>
</html>
