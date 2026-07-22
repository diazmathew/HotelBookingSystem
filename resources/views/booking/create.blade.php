@extends('layouts.user')

@section('content')

<div
    x-data="bookingForm()"
    class="max-w-4xl mx-auto animate-fade-in"
>

    <div class="eyebrow mb-3">Guest Services</div>

    <div class="card-luxury p-8">

        <h1 class="heading-display text-4xl text-jade-900 mb-6">
            Book a Room
        </h1>

        {{-- Server-rendered flash (non-JS fallback) --}}
        <x-flash type="success" :message="session('success')" />
        <x-flash type="error" :message="session('error')" />

        {{-- AJAX success toast --}}
        <div
            x-show="success"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            x-cloak
            class="bg-jade-50 border-l-4 border-jade-600 text-jade-800 p-4 mb-5 flex items-center gap-2"
        >
            <span x-text="successMessage"></span>
        </div>

        {{-- AJAX error banner --}}
        <div
            x-show="error"
            x-cloak
            class="bg-red-50 border-l-4 border-red-700 text-red-800 p-4 mb-5"
            :class="{ 'animate-shake': shakeError }"
        >
            <span x-text="errorMessage"></span>
            <ul class="list-disc pl-5 mt-2" x-show="Object.keys(validationErrors).length">
                <template x-for="(messages, field) in validationErrors" :key="field">
                    <template x-for="msg in messages" :key="msg">
                        <li x-text="msg"></li>
                    </template>
                </template>
            </ul>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-700 text-red-800 p-4 mb-5">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form @submit.prevent="submitBooking" enctype="multipart/form-data">

            @csrf

            <!-- Customer Name -->

            <div class="mb-6">

                <label class="label-luxury">
                    Customer Name
                </label>

                <input
                    type="text"
                    x-model="form.customer_name"
                    class="input-luxury"
                    required>

            </div>

            <!-- Room Type Cards -->

            <div class="mb-6">

                <label class="label-luxury">
                    Choose a Room Type
                </label>

                <div class="grid sm:grid-cols-2 gap-4">

                    @foreach($roomTypes as $index => $roomType)

                        <button
                            type="button"
                            @click="selectRoom({{ $roomType->id }}, @js($roomType->room_name), {{ $roomType->price }}, {{ $roomType->max_occupancy }}, @js($roomType->description))"
                            class="card-hover animate-fade-in stagger-{{ ($index % 4) + 1 }} text-left border p-5 transition-colors bg-white"
                            :class="form.room_type_id === {{ $roomType->id }}
                                ? 'border-gold-500 ring-1 ring-gold-400 bg-ivory-100'
                                : 'border-jade-800/15 hover:border-gold-400/60'"
                        >
                            <div class="flex justify-between items-start">
                                <h3 class="font-display text-xl text-jade-900">
                                    {{ $roomType->room_name }}
                                </h3>
                                <span
                                    x-show="form.room_type_id === {{ $roomType->id }}"
                                    x-cloak
                                    class="animate-pop text-gold-600 text-lg"
                                >&#10003;</span>
                            </div>

                            <p class="text-sm text-jade-700/70 mt-1 font-light">
                                {{ $roomType->description }}
                            </p>

                            <div class="flex justify-between items-center mt-4">
                                <span class="text-gold-700 font-medium">
                                    &#8369;{{ number_format($roomType->price,2) }} / night
                                </span>
                                <span class="text-jade-700/60 text-sm">
                                    up to {{ $roomType->max_occupancy }}
                                </span>
                            </div>

                        </button>

                    @endforeach

                </div>

            </div>

            <!-- ROOM DETAILS -->

            <div
                x-show="form.room_type_id"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-cloak
                class="bg-jade-950 p-6 mb-6"
            >

                <h2 class="eyebrow text-gold-400 mb-4">
                    Room Details
                </h2>

                <div class="grid md:grid-cols-2 gap-5 text-ivory-100">

                    <div>
                        <p class="label-luxury !text-gold-300/80">Room Type</p>
                        <p x-text="selectedRoom.name"></p>
                    </div>

                    <div>
                        <p class="label-luxury !text-gold-300/80">Maximum Occupancy</p>
                        <p><span x-text="selectedRoom.occupancy"></span> Guests</p>
                    </div>

                    <div>
                        <p class="label-luxury !text-gold-300/80">Price</p>
                        <p>&#8369;<span x-text="formattedPrice"></span> / night</p>
                    </div>

                    <div>
                        <p class="label-luxury !text-gold-300/80">Description</p>
                        <p class="font-light" x-text="selectedRoom.description"></p>
                    </div>

                </div>

            </div>

            <!-- Booking Calendar -->

            <div class="mb-6">

                <h2 class="eyebrow mb-4">
                    Booking Calendar
                </h2>

                <p class="text-jade-700/70 mb-3 font-light">
                    Select a room type first to view booked dates.
                </p>

                <div class="bg-white border border-jade-800/10 p-4 shadow-sm">
                    <div id="bookingCalendar"></div>
                </div>

            </div>

            <!-- Check-in / Check-out -->

            <div class="grid sm:grid-cols-2 gap-4 mb-6">

                <div>
                    <label class="label-luxury">
                        Check-in Date
                    </label>

                    <input
                        id="check_in_date"
                        type="date"
                        x-model="form.check_in_date"
                        class="input-luxury"
                        required>
                </div>

                <div>
                    <label class="label-luxury">
                        Check-out Date
                    </label>

                    <input
                        id="check_out_date"
                        type="date"
                        x-model="form.check_out_date"
                        class="input-luxury"
                        required>
                </div>

            </div>

            <!-- Upload Receipt -->

            <div class="mb-6">

                <label class="label-luxury">
                    Upload Payment Receipt
                </label>

                <label
                    for="payment_receipt"
                    class="card-hover flex items-center justify-center gap-2 border-2 border-dashed border-jade-800/20 px-4 py-8 cursor-pointer text-jade-700/60 hover:border-gold-400 hover:text-gold-700"
                >
                    <span x-text="fileName || 'Click to choose a file (JPG, JPEG, PNG, PDF)'"></span>
                </label>

                <input
                    type="file"
                    id="payment_receipt"
                    @change="onFileChange"
                    accept=".jpg,.jpeg,.png,.pdf"
                    class="hidden">

            </div>

            <!-- Image Preview -->

            <div
                x-show="previewUrl"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-cloak
                class="mb-6"
            >

                <label class="label-luxury">
                    Receipt Preview
                </label>

                <img
                    :src="previewUrl"
                    class="w-72 border border-jade-800/10 shadow-sm">

            </div>

            <!-- Submit -->

            <button
                type="submit"
                :disabled="submitting"
                class="btn-gold disabled:opacity-60 disabled:cursor-not-allowed inline-flex items-center gap-2"
            >
                <svg
                    x-show="submitting"
                    x-cloak
                    class="animate-spin h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                >
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <span x-text="submitting ? 'Submitting…' : 'Submit Booking'"></span>
            </button>

        </form>

    </div>

</div>

<script>

function bookingForm() {
    return {
        form: {
            customer_name: @json(old('customer_name', auth()->user()->name)),
            room_type_id: @json(old('room_type_id')),
            check_in_date: @json(old('check_in_date')),
            check_out_date: @json(old('check_out_date')),
        },
        selectedRoom: { name: '', price: 0, occupancy: 0, description: '' },
        fileObject: null,
        fileName: '',
        previewUrl: null,
        submitting: false,
        success: false,
        successMessage: '',
        error: false,
        errorMessage: '',
        shakeError: false,
        validationErrors: {},
        calendar: null,

        get formattedPrice() {
            return Number(this.selectedRoom.price || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        },

        selectRoom(id, name, price, occupancy, description) {
            this.form.room_type_id = id;
            this.selectedRoom = { name, price, occupancy, description };

            if (this.calendar) {
                this.calendar.refetchEvents();
            }
        },

        onFileChange(e) {
            const file = e.target.files[0];

            this.fileObject = file || null;
            this.fileName = file ? file.name : '';

            if (!file) {
                this.previewUrl = null;
                return;
            }

            if (file.type.startsWith('image')) {
                const reader = new FileReader();
                reader.onload = (event) => { this.previewUrl = event.target.result; };
                reader.readAsDataURL(file);
            } else {
                this.previewUrl = null;
            }
        },

        flashSuccess(message) {
            this.error = false;
            this.successMessage = message;
            this.success = true;
            setTimeout(() => { this.success = false; }, 4000);
        },

        flashError(message) {
            this.success = false;
            this.errorMessage = message;
            this.error = true;
            this.shakeError = true;
            setTimeout(() => { this.shakeError = false; }, 400);
        },

        async submitBooking() {

            this.validationErrors = {};
            this.submitting = true;

            const data = new FormData();
            data.append('customer_name', this.form.customer_name || '');
            data.append('room_type_id', this.form.room_type_id || '');
            data.append('check_in_date', this.form.check_in_date || '');
            data.append('check_out_date', this.form.check_out_date || '');

            if (this.fileObject) {
                data.append('payment_receipt', this.fileObject);
            }

            try {

                const response = await axios.post('{{ route('booking.store') }}', data, {
                    headers: { 'Content-Type': 'multipart/form-data' },
                });

                this.flashSuccess(response.data.message || 'Booking submitted successfully.');

                // Reset form for the next booking
                this.form.check_in_date = '';
                this.form.check_out_date = '';
                this.fileObject = null;
                this.fileName = '';
                this.previewUrl = null;
                document.getElementById('payment_receipt').value = '';

                if (this.calendar) {
                    this.calendar.refetchEvents();
                }

            } catch (err) {

                if (err.response && err.response.status === 422) {
                    this.validationErrors = err.response.data.errors || {};
                    this.flashError(err.response.data.message || 'Please check the form and try again.');
                } else {
                    this.flashError('Something went wrong. Please try again.');
                }

            } finally {
                this.submitting = false;
            }

        },

        initCalendar() {

            const calendarEl = document.getElementById('bookingCalendar');

            this.calendar = new Calendar(calendarEl, {

                plugins: [dayGridPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
                height: 600,

                events: (fetchInfo, successCallback, failureCallback) => {
                    fetch('/calendar/events?room_type=' + (this.form.room_type_id || ''))
                        .then(res => res.json())
                        .then(data => successCallback(data))
                        .catch(err => failureCallback(err));
                },

                dateClick: (info) => {
                    this.form.check_in_date = info.dateStr;
                },

                eventClick: (info) => {
                    alert(
                        "Already Booked\n\n" +
                        "Room Type : " + info.event.title + "\n" +
                        "Customer : " + info.event.extendedProps.customer + "\n" +
                        "Status : " + info.event.extendedProps.status
                    );
                }

            });

            this.calendar.render();
        },

        init() {
            this.$nextTick(() => this.initCalendar());
        },
    };
}

</script>

@endsection
