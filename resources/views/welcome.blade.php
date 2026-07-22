<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z4ID Booking</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:500,600,700|jost:300,400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-jade-950 font-sans">

<div class="min-h-screen relative flex items-center justify-center overflow-hidden">

    <!-- Ambient gold glow -->
    <div class="pointer-events-none absolute -top-1/3 left-1/2 -translate-x-1/2 w-[900px] h-[900px] rounded-full bg-gold-500/10 blur-3xl"></div>

    <div class="relative z-10 text-center px-6 animate-fade-in max-w-xl">

        <svg viewBox="0 0 100 100" class="w-16 h-16 mx-auto mb-8 text-gold-400">
            <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
            <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
            <circle cx="50" cy="50" r="6" fill="currentColor"/>
        </svg>

        <div class="eyebrow text-gold-400 justify-center mb-4">@if(!empty($name)) Welcome, {{ $name }} @else Welcome @endif</div>

        <h1 class="heading-display text-ivory-50 text-6xl md:text-7xl">
            Z4ID
        </h1>

        <div class="divider-ornament"><span></span></div>

        <p class="mt-2 text-ivory-300/80 font-light leading-8 max-w-md mx-auto">
            A sanctuary of quiet luxury. Reserve your stay, and let us
            take care of the rest — from arrival to farewell.
        </p>

        <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">

            @guest
                <a href="{{ route('login') }}" class="btn-gold w-full sm:w-auto">
                    Sign In
                </a>

                <a href="{{ route('register') }}" class="btn-gold-outline w-full sm:w-auto">
                    Register
                </a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn-gold w-full sm:w-auto">
                    Go to Dashboard
                </a>
            @endauth

        </div>

    </div>

</div>

</body>
</html>
