@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto animate-fade-in">

    <div class="eyebrow mb-3">Administration</div>

    <div class="card-luxury p-8">

        <h1 class="heading-display text-3xl text-jade-900 mb-6">
            Add Room Type
        </h1>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-700 text-red-800 p-4 mb-5 animate-shake">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('room_types.store') }}"
            method="POST"
            x-data="{ loading: false }"
            x-on:submit="loading = true"
        >

            @csrf

            <div class="mb-5">
                <label class="label-luxury">Room Name</label>
                <input
                    type="text"
                    name="room_name"
                    value="{{ old('room_name') }}"
                    class="input-luxury"
                    required>
            </div>

            <div class="mb-5">
                <label class="label-luxury">Description</label>
                <textarea
                    name="description"
                    rows="3"
                    class="input-luxury"
                    required>{{ old('description') }}</textarea>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 mb-6">

                <div>
                    <label class="label-luxury">Price (per night)</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        value="{{ old('price') }}"
                        class="input-luxury"
                        required>
                </div>

                <div>
                    <label class="label-luxury">Maximum Occupancy</label>
                    <input
                        type="number"
                        name="max_occupancy"
                        value="{{ old('max_occupancy') }}"
                        class="input-luxury"
                        required>
                </div>

            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    :disabled="loading"
                    class="btn-gold disabled:opacity-60 inline-flex items-center gap-2"
                >
                    <svg x-show="loading" x-cloak class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span x-text="loading ? 'Saving…' : 'Save Room Type'"></span>
                </button>

                <a href="{{ route('room_types.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-white border border-jade-800/30 text-jade-800 font-medium text-xs uppercase tracking-[0.15em] hover:bg-ivory-200 transition-colors">
                    Back
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
