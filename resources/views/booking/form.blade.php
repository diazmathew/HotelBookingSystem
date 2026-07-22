@extends('booking.layout')

@section('content')

<h2>Hotel Booking Form</h2>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

@if($errors->any())

<div class="alert alert-danger">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('booking.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<label>Customer Name</label>

<input
type="text"
name="customer_name"
class="form-control"
value="{{ old('customer_name') }}">

<br>

<label>Room Type</label>

<select
name="room_type_id"
class="form-control">

<option value="">Select Room Type</option>

@foreach($roomTypes as $roomType)

<option
value="{{ $roomType->id }}"
{{ old('room_type_id')==$roomType->id ? 'selected' : '' }}>

{{ $roomType->room_name }}
- ₱{{ number_format($roomType->price,2) }}

</option>

@endforeach

</select>

<br>

<label>Check-in Date</label>

<input
type="date"
name="check_in_date"
class="form-control"
value="{{ old('check_in_date') }}">

<br>

<label>Check-out Date</label>

<input
type="date"
name="check_out_date"
class="form-control"
value="{{ old('check_out_date') }}">

<br>

<label>Proof of Payment</label>

<input
type="file"
name="payment_receipt"
class="form-control">

<br>

<button class="btn btn-primary">

Submit Booking

</button>

</form>

@endsection
