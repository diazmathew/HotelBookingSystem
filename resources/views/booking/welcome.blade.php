@extends('booking.layout')

@section('content')

<h1>Welcome, {{ $name }}!</h1>

<p>
    Welcome to our <strong>Hotel Booking System</strong>.
</p>

<p>
    We offer comfortable rooms for business trips, vacations,
    weekend getaways, and other special stays.
</p>

<br>

<a href="{{ route('booking.create') }}">
    <button>Book a Room Now</button>
</a>

@endsection
