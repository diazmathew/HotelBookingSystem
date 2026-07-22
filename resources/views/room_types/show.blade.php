@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto animate-fade-in">

    <div class="eyebrow mb-3">Administration</div>

    <div class="card-luxury overflow-hidden card-hover">

        <div class="bg-jade-950 px-8 py-6">
            <h3 class="heading-display text-2xl text-ivory-50">{{ $roomType->room_name }}</h3>
        </div>

        <div class="p-8 space-y-4">

            <div>
                <p class="label-luxury mb-1">Description</p>
                <p class="text-jade-800 font-light">{{ $roomType->description }}</p>
            </div>

            <div>
                <p class="label-luxury mb-1">Price</p>
                <p class="text-gold-700 font-medium">&#8369;{{ number_format($roomType->price,2) }} / night</p>
            </div>

            <div>
                <p class="label-luxury mb-1">Maximum Occupancy</p>
                <p class="text-jade-800">{{ $roomType->max_occupancy }} guests</p>
            </div>

        </div>

    </div>

    <div class="mt-6 flex gap-3">

        <a href="{{ route('room_types.edit',$roomType) }}"
           class="btn-gold">
            Edit
        </a>

        <a href="{{ route('room_types.index') }}"
           class="inline-flex items-center px-7 py-3 bg-white border border-jade-800/30 text-jade-800 font-medium text-sm uppercase tracking-[0.15em] hover:bg-ivory-200 transition-colors">
            Back
        </a>

    </div>

</div>

@endsection
