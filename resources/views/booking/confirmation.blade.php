@extends('booking.layout')

@section('content')

<div style="background:#d1e7dd;color:#0f5132;padding:15px;border-radius:5px;">

Booking submitted successfully!

</div>

<br>

<h2>Booking Details</h2>

<hr>

<p><strong>Customer Name:</strong> {{ $customer_name }}</p>

<p><strong>Room Type:</strong> {{ $roomType }}</p>

<p><strong>Check-in Date:</strong> {{ $check_in_date }}</p>

<p><strong>Check-out Date:</strong> {{ $check_out_date }}</p>

<p><strong>Status:</strong> Pending</p>

<p><strong>Uploaded Receipt:</strong></p>

<a href="{{ asset('storage/'.$receipt) }}" target="_blank">

View Uploaded File

</a>

<br><br>

<a href="{{ route('booking.create') }}">

<button>Book Again</button>

</a>

@endsection
